<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class AboutController extends Controller
{
    public function viewAbout()
    {
        $about_us = DB::table('abouts')->orderBy('id', 'desc')->get();

        return view('admin.about.view_about')->with(compact('about_us'));
    }

    public function viewAboutDetail($id)
    {
        $about_us = DB::table('abouts')->where(['id'=>$id])->first();

        return view('admin.about.view_about_detail')->with(compact('about_us'));
    }

    public function addAbout(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $home_section = DB::table('abouts')->where(['section_no'=>$data['section_no']])->count();

            if ($home_section == 0) {

                if($request->hasFile('image')){

                    $image_tmp = $request->image;

                    if($image_tmp->isValid()){

                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        // $filename = 'about_image_'.rand(1111,9999999).'.'.$extension;
                        $filename = $image_tmp->getClientOriginalName();

                        $large_image_path = 'images/backend-images/about/'.$filename;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);

                    }

                }else{
                    $filename = '';
                }

                if($request->hasFile('image_sec')){

                    $image_tmp = $request->image_sec;

                    if($image_tmp->isValid()){

                        $manager = new ImageManager(new Driver());
                        $extension = $image_tmp->getClientOriginalExtension();
                        // $filename_2 = 'about_image_'.rand(1111,9999999).'.'.$extension;
                        $filename_2 = $image_tmp->getClientOriginalName();

                        $large_image_path = 'images/backend-images/about/'.$filename_2;
                        $image = $manager->read($image_tmp);
                        $image->save($large_image_path);

                    }

                }else{
                    $filename_2 = '';
                }

                $about = new About();
                $about->section_no = $data['section_no'];
                $about->section_condition = $data['section_condition'];
                $about->title = $data['desc_title'];
                $about->title_brief_detail = $data['desc_title_sec'];
                $about->image = $filename;
                $about->image_2 = $filename_2;
                $about->description = $data['description'];
                $about->description_2 = $data['description_sec'];
                $about->save();

                return redirect('/admin/view-about-us')->with('flash_message_success','About Us Added Successfully!');

            }else{

                return redirect()->back()->with('flash_message_error', $data['section_no'].' Already Added!');

            }

        }

        return view('admin.about.add_about');

    }

    public function editAbout(Request $request, $id)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $about_image =About::where(['id'=>$id])->first();
            // image file delete start
            $image = $about_image->image;
            $image_2 = $about_image->image_2;

            $image_path = 'images/backend-images/about/'.$image;
            $image_path_2 = 'images/backend-images/about/'.$image_2;

            if($request->hasFile('image')){

                $image_tmp = $request->image;

                if(File::exists($image_path)){
                    File::delete($image_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    // $filename = 'about_image_'.rand(1111,9999999).'.'.$extension;
                    $filename = $image_tmp->getClientOriginalName();

                    $large_image_path = 'images/backend-images/about/'.$filename;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename = $data['cur_image'];
            }

            if($request->hasFile('image_sec')){

                $image_tmp = $request->image_sec;

                if(File::exists($image_path_2)){
                    File::delete($image_path_2);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    // $filename_2 = 'about_image_'.rand(1111,9999999).'.'.$extension;
                    $filename_2 = $image_tmp->getClientOriginalName();

                    $large_image_path = 'images/backend-images/about/'.$filename_2;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_2 = $data['cur_image_sec'];
            }

            About::where(['id'=>$id])->update
            ([
                'section_condition' => $data['section_condition'],
                'image'=>$filename,
                'title'=>$data['desc_title'],
                'description'=>$data['description'],
                'image_2'=>$filename_2,
                'title_brief_detail'=>$data['desc_title_sec'],
                'description_2'=>$data['description_sec'],
                'isActive'=>$data['isActive'],
            ]);

            return redirect('/admin/view-about-us')->with('flash_message_success','About Us Updated Successfully!');
        }

        $about =About::where(['id'=>$id])->first();

        return view('admin.about.edit_about')->with(compact('about'));

    }

    public function deleteAbout($id = null)
    {

        $about_image = About::where(['id'=>$id])->first();
        // image file delete start
        $image = $about_image->image;
        $image_2 = $about_image->image_2;

        $image_path = 'images/backend-images/about/'.$image;
        $image_path_2 = 'images/backend-images/about/'.$image_2;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        if(File::exists($image_path_2)){
            File::delete($image_path_2);
        }

        About::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','About Us Deleted Successfully!');

    }

}
