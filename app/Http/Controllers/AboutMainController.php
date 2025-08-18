<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AboutMain;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class AboutMainController extends Controller
{
    public function editAboutMain(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $about_image =AboutMain::where(['id'=>1])->first();
            // image file delete start
            $image = $about_image->image;
            $image_2 = $about_image->signature_image;
            // $pop_card_image = $about_image->pop_card_image;

            $image_path = 'images/backend-images/about/'.$image;
            $image_path_2 = 'images/backend-images/about/'.$image_2;
            // $pop_card_image_path = 'images/backend-images/about/'.$pop_card_image;

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


            // if($request->hasFile('pop_card_image')){

            //     $image_tmp = $request->pop_card_image;

            //     if(File::exists($pop_card_image_path)){
            //         File::delete($pop_card_image_path);
            //     }

            //     if($image_tmp->isValid()){

            //         $manager = new ImageManager(new Driver());
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // $filename_2 = 'about_image_'.rand(1111,9999999).'.'.$extension;
            //         $filename_pop_card = $image_tmp->getClientOriginalName();

            //         $large_image_path = 'images/backend-images/about/'.$filename_pop_card;
            //         $image = $manager->read($image_tmp);
            //         $image->save($large_image_path);

            //     }

            // }else{
            //     $filename_pop_card = $data['cur_pop_card_image'];
            // }

            AboutMain::where(['id'=>1])->update
            ([
                'heading' => $data['heading'],
                'title'=>$data['title'],
                'description'=>$data['description'],
                // 'experiance'=>$data['experiance'],
                'image'=>$filename,
                'signature_image'=>$filename_2,
                // 'pop_card'=>$data['pop_card_heading'],
                // 'pop_card_image'=>$filename_pop_card,
                // 'pop_card_description'=>$data['pop_card_description'],
            ]);

            return redirect()->back()->with('flash_message_success','About Main Us Updated Successfully!');
        }

        $about = AboutMain::where(['id'=>1])->first();

        return view('admin.about-main.edit_about')->with(compact('about'));

    }

    public function deleteSignatureImage($id = null)
    {
        $about_image = AboutMain::where(['id'=>$id])->first();
        // image file delete start
        $image = $about_image->signature_image;

        $image_path = 'images/backend-images/about/'.$image;

        if(File::exists($image_path)){
            File::delete($image_path);
        }

        AboutMain::where(['id'=>$id])->update
        ([
            'signature_image'=>''
        ]);

        return redirect()->back()->with('flash_message_success','Signature Image Deleted Successfully!');

    }
}
