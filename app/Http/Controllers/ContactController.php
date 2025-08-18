<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{
    public function viewContactMessage()
    {

        Contact::where(['read_msg'=>0])->update
        ([
            'read_msg'=>1,
        ]);

        $contact_messages = DB::table('contacts')->orderBy('id', 'desc')->get();

        return view('admin.contact.view_contact')->with(compact('contact_messages'));
    }

    public function viewContactMessageDetail($id)
    {
        $message = DB::table('contacts')->where(['id'=>$id])->first();

        return view('admin.contact.view_contact_detail')->with(compact('message'));
    }

    public function deleteContactMessage($id = null)
    {

        Contact::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Contact Message Deleted Successfully!');

    }

}
