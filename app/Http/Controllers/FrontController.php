<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\About;
use App\Models\FrontFooter;
use App\Models\MetaTag;
use App\Models\AboutMain;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndCondition;
use Validate;
use Mail;
use App\Mail\ContactMail;
use App\Mail\FreeConsultationMail;
use Session;

class FrontController extends Controller
{
    public function index(Request $request, $ref_code = null){

        $referralCode = $ref_code ?? $request->query('ref');

        if ($referralCode) {
            session(['referral_code' => $referralCode]);
        }

        $about_main = DB::table('about_mains')->first();

    	return view('frontend.index')->with(compact('about_main'));
    }

    public function about(){

        $about_sections = DB::table('abouts')->where(['isActive'=>1])->get();

    	return view('frontend.about')->with(compact('about_sections'));
    }

    public function contact(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $request->validate([
                'g-recaptcha-response' => 'required|captcha'
            ]);

            $contact = new Contact();
            $contact->name = $data['name'];
            $contact->email = $data['email'];
            $contact->phone = $data['phone'];
            $contact->subject = $data['subject'];
            $contact->message = $data['message'];
            $contact->save();

            $data = array(
                'name'      =>  $request->name,
                'email'   =>   $request->email,
                'phone'   =>   $request->phone,
                'subject'   =>   $request->subject,
                'message'   =>   $request->message
            );

            Mail::to('cogentdevs@gmail.com')->send(new ContactMail($data));

            // return redirect('/contact')->with('flash_message_success','Your Message Send Successfully!');
            return redirect()->to(url()->previous() . '#submit')->with('flash_message_success', 'Thank You For Contacting Us. Our team will get back to you shortly!');

        }

        $front_footer = DB::table('front_footers')->first();

        $front_footer_count = DB::table('front_footers')->count();

    	return view('frontend.contact')->with(compact('front_footer', 'front_footer_count'));
    }

    public function testimonials(){

    	$testimonials = Testimonial::where(['isActive'=>1])->orderBy('id', 'desc')->get();

    	return view('frontend.testimonials')->with(compact('testimonials'));
    }

    public function blog(){

        $blogs = Blog::where(['isActive'=>1])->orderBy('id', 'desc')->paginate(12);
        $paginator = $blogs;

        $blogs_metatags = DB::table('meta_tags')->where(['table_name'=>'blogs'])->get();

        return view('frontend.blog')->with(compact('blogs', 'paginator', 'blogs_metatags'));
    }

    public function blogDetail($id){

        $blog = Blog::where(['id'=>$id])->first();

        $recent_blogs = Blog::where(['isActive'=>1])->orderBy('id', 'desc')->limit(3)->get();

        return view('frontend.blogDetail')->with(compact('blog', 'recent_blogs'));
    }

    public function privacyPolicy(){

        $privacy_policy = DB::table('privacy_policies')->first();

        return view('frontend.privacy-policy')->with(compact('privacy_policy'));
        
    }

    public function termsAndCondition(){

        $terms_conditions = DB::table('terms_and_conditions')->first();

        return view('frontend.terms-and-condition')->with(compact('terms_conditions'));

    }

    public function freeConsultation(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $data = array(
                'name'      =>  $request->name,
                'email'   =>   $request->email,
                'company'   =>   $request->company
            );

            Mail::to('cogentdevs@gmail.com')->send(new FreeConsultationMail($data));

            // return redirect()->back()->with('flash_message_success','Thank You For Contacting Us Our Team Get Back To You Shortly !');
            return redirect()->to(url()->previous() . '#thank-you')->with('flash_message_success', 'Thank You For Contacting Us. Our team will get back to you shortly!');


        }

    }
}
