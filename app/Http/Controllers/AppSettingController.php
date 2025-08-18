<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class AppSettingController extends Controller
{
    public function editAppSetting(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $app_setting =AppSetting::where(['id'=>1])->first();
            // image file delete start
            $logo = $app_setting->app_logo;
            $footer = $app_setting->app_logo_footer;
            $favicon = $app_setting->app_favicon;

            $logo_path = 'images/backend-images/app-logo/'.$logo;
            $footer_path = 'images/backend-images/app-logo/'.$footer;
            $favicon_path = 'images/backend-images/app-logo/'.$favicon;

            if($request->hasFile('app_logo')){

                $image_tmp = $request->app_logo;

                if(File::exists($logo_path)){
                    File::delete($logo_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    // $filename = 'blog_image_'.rand(1111,9999999).'.'.$extension;
                    $filename_logo = $image_tmp->getClientOriginalName();

                    $large_image_path = 'images/backend-images/app-logo/'.$filename_logo;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_logo = $data['cur_app_logo'];
            }

            if($request->hasFile('app_logo_footer')){

                $image_tmp = $request->app_logo_footer;

                if(File::exists($logo_path)){
                    File::delete($logo_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    // $filename = 'blog_image_'.rand(1111,9999999).'.'.$extension;
                    $filename_logo_footer = $image_tmp->getClientOriginalName();

                    $large_image_path = 'images/backend-images/app-logo/'.$filename_logo_footer;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_logo_footer = $data['cur_app_logo_footer'];
            }

            if($request->hasFile('app_favicon')){

                $image_tmp = $request->app_favicon;

                if(File::exists($logo_path)){
                    File::delete($logo_path);
                }

                if($image_tmp->isValid()){

                    $manager = new ImageManager(new Driver());
                    $extension = $image_tmp->getClientOriginalExtension();
                    // $filename = 'blog_image_'.rand(1111,9999999).'.'.$extension;
                    $filename_favicon = $image_tmp->getClientOriginalName();

                    $large_image_path = 'images/backend-images/app-logo/'.$filename_favicon;
                    $image = $manager->read($image_tmp);
                    $image->save($large_image_path);

                }

            }else{
                $filename_favicon = $data['cur_app_favicon'];
            }

            AppSetting::where(['id'=>1])->update
            ([
                'app_logo'=>$filename_logo,
                'app_logo_footer'=>$filename_logo_footer,
                'app_favicon'=>$filename_favicon,
                'app_name'=>$data['app_name'],
                'app_url'=>$data['app_url'],
            ]);


            return redirect()->back()->with('flash_message_success','Updated Successfully!');
        }

        $app_setting = AppSetting::where(['id'=>1])->first();

        return view('admin.app-setting.edit-app-setting')->with(compact('app_setting'));

    }
}
