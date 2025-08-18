<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SUpportChat;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Events\SupportMessageEvent;

class GenerateAIResponse implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $room_id;
    public $user_message;
    public $user_id;
    public $ai_id;

    public function __construct($room_id, $user_message, $user_id, $ai_id)
    {
        $this->room_id = $room_id;
        $this->user_message = $user_message;
        $this->user_id = $user_id;
        $this->ai_id = $ai_id;
    }

    public function handle()
    {
        $serviceList = Service::where('isActive', 1)->get()->map(function ($s) {
            return "{$s->name}: " . strip_tags($s->description);
        })->implode("\n");

        $systemMessage = "You are a support assistant. ONLY answer questions based on these services:\n{$serviceList}\nDo not include any services not listed here. Do NOT invent or assume any additional services. If the user asks for something we do NOT offer, politely inform them that we do not provide that service.";

        $previousMessages = SUpportChat::where('support_chat_room_id', $this->room_id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->take(-10);

        $chatHistory = [['role' => 'system', 'content' => $systemMessage]];

        foreach ($previousMessages as $msg) {
            $role = $msg->msg_by == $this->user_id ? 'user' : 'assistant';
            $chatHistory[] = ['role' => $role, 'content' => $msg->message];
        }

        $chatHistory[] = ['role' => 'user', 'content' => $this->user_message];

        $openaiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->timeout(20)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $chatHistory,
            'temperature' => 0.2,
            'top_p' => 0.8,
        ]);

        if ($openaiResponse->successful()) {
            $reply = $openaiResponse['choices'][0]['message']['content'] ?? 'Sorry, something went wrong.';
        } else {
            Log::error('OpenAI API failed:', $openaiResponse->json());
            $reply = 'OpenAI API error: ' . $openaiResponse->body();
        }

        $ai_message = new SUpportChat();
        $ai_message->support_chat_room_id = $this->room_id;
        $ai_message->msg_by = $this->ai_id;
        $ai_message->message = $reply;
        $ai_message->msg_time = now()->format('m/d/Y h:i a');
        $ai_message->save();

        broadcast(new SupportMessageEvent($ai_message->load('user')))->toOthers();
    }
}
