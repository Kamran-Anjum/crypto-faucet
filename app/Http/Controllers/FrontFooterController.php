<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\FrontFooter;

class FrontFooterController extends Controller
{
    public function viewFrontFooter()
    {
        $front_footer = DB::table('front_footers')->first();

        $front_footer_count = DB::table('front_footers')->count();

        return view('admin.front-footer.view_front_footer')->with(compact('front_footer', 'front_footer_count'));
    }

    public function addFrontFooter(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

        	$front_footer = new FrontFooter();
            $front_footer->address = $data['address'];
            $front_footer->phone_1 = $data['phone_1'];
            $front_footer->phone_2 = $data['phone_2'];
            $front_footer->email = $data['email'];
            $front_footer->google = $data['google'];
            $front_footer->linkedin = $data['linkedin'];
            $front_footer->twitter = $data['twitter'];
            $front_footer->facebook = $data['facebook'];
            $front_footer->instagram = $data['instagram'];
            $front_footer->youtube = $data['youtube'];
            $front_footer->save();

            return redirect('/admin/view-front-footer-item')->with('flash_message_success','Front Footer Items Added Successfully!');

        }

        return view('admin.front-footer.add_front_footer');

    }

    public function editFrontFooter(Request $request, $column_name, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

			$item = '';            

            if ($column_name == 'address') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'address'=>$data['address']
	            ]);

	            $item = 'Address';
            	
            } elseif ($column_name == 'phone_1') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'phone_1'=>$data['phone_1']
	            ]);

	            $item = 'Phone 1';
            	
            } elseif ($column_name == 'phone_2') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'phone_2'=>$data['phone_2']
	            ]);

	            $item = 'Phone 2';
            	
            } elseif ($column_name == 'email') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'email'=>$data['email']
	            ]);

	            $item = 'E-mail';
            	
            } elseif ($column_name == 'google-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'google'=>$data['google']
	            ]);

	            $item = 'Google Link';
            	
            } elseif ($column_name == 'linkedin-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'linkedin'=>$data['linkedin']
	            ]);

	            $item = 'Linkedin Link';
            	
            } elseif ($column_name == 'twitter-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'twitter'=>$data['twitter']
	            ]);

	            $item = 'Twitter Link';
            	
            } elseif ($column_name == 'facebook-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'facebook'=>$data['facebook']
	            ]);

	            $item = 'Facebook Link';
            	
            } elseif ($column_name == 'instagram-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'instagram'=>$data['instagram']
	            ]);

	            $item = 'Instagram Link';
            	
            } elseif ($column_name == 'youtube-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'youtube'=>$data['youtube']
	            ]);

	            $item = 'Youtube Link';
            	
            }

            return redirect('/admin/view-front-footer-item')->with('flash_message_success', $item.' Updated Successfully!');
        }

        $front_footer =FrontFooter::where(['id'=>$id])->first();

        return view('admin.front-footer.edit_front_footer')->with(compact('front_footer', 'column_name'));

    }

    public function deleteFrontFooter($column_name, $id = null)
    {

        $item = '';            

            if ($column_name == 'address') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'address'=>''
	            ]);

	            $item = 'Address';
            	
            } elseif ($column_name == 'phone_1') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'phone_1'=>''
	            ]);

	            $item = 'Phone 1';
            	
            } elseif ($column_name == 'phone_2') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'phone_2'=>''
	            ]);

	            $item = 'Phone 2';
            	
            } elseif ($column_name == 'email') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'email'=>''
	            ]);

	            $item = 'E-mail';
            	
            } elseif ($column_name == 'google-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'google'=>''
	            ]);

	            $item = 'Google Link';
            	
            } elseif ($column_name == 'linkedin-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'linkedin'=>''
	            ]);

	            $item = 'Linkedin Link';
            	
            } elseif ($column_name == 'twitter-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'twitter'=>''
	            ]);

	            $item = 'Twitter Link';
            	
            } elseif ($column_name == 'facebook-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'facebook'=>''
	            ]);

	            $item = 'Facebook Link';
            	
            } elseif ($column_name == 'instagram-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'instagram'=>''
	            ]);

	            $item = 'Instagram Link';
            	
            } elseif ($column_name == 'youtube-link') {

            	FrontFooter::where(['id'=>$id])->update
	            ([
	                'youtube'=>''
	            ]);

	            $item = 'Youtube Link';
            	
            }

            return redirect('/admin/view-front-footer-item')->with('flash_message_success', $item.' Deleted Successfully!');

    }
}
