<?php namespace Uttapong\S3VideoUploader\Components;

use Cms\Classes\ComponentBase;
use Input;
// use Mail;
use Flash;
use Validator;
use Redirect;
use Uttapong\S3VideoUploader\Models\VideoUploader;
use Storage;

class VideoPush extends ComponentBase
{

    public function componentDetails(){
        return [
            'name' => 'Push Video using S3',
            'description' => 'Video uploader'
        ];
    }

    public function onHandleForm(){
        die('start');
        $validator = Validator::make(
            [
                'name' => Input::get('name'),
                'submitter' => Input::get('submitter'),
                'tel' => Input::get('tel'),
                'email' => Input::get('email'),
                'video' => Input::get('email')
            ],
            [
                'name' => 'required',
                'submitter' => 'required',
                'tel' => 'required',
                'video' => 'required',
                'email' => 'required|email'
            ]
        );

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
            
        } else {
            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

        $video = new VideoUploader();
        $video->name = Input::get('name');
        $video->submitter = Input::get('submitter');
        $video->email = Input::get('email');
        $video->tel = Input::get('tel');

        // die('zadfadfadf');
        // $video->submitter = Input::get('submitter');
        if (Input::file('video')->isValid()) {
            $newfilename=uniqid().".".Input::file('video')->getClientOriginalExtension();
            $folder="/".date("Y-m-d")."/";
            $result=Input::file('video')->move($folder, $fileName);
            print_r($result);
            die();
            // if(Input::file('video')->move($folder, $fileName)){
            //     $video->filename = $filename;
            //     $video->s3url = $folder.$filename;
            // }
            // else{
            //     return Redirect::back()->withErrors(['message', 'การอัพโหลดไม่สำเร็จ กรุณาลองใหม่อีกครั้ง']);
            // }
            
            //
        }
        $disk= Storage::disk('s3');
        $disk->put($targetFile, file_get_contents($sourceFile));

        $video->save();
        Flash::success('อัพโหลดคลิปวิดีโอสำเร็จ');
        return Redirect::back();
        }
        
     }


    public function onSend(){
        

    }

}