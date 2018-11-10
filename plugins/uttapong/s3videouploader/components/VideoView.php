<?php namespace Uttapong\S3VideoUploader\Components;

use Cms\Classes\ComponentBase;
use Input;
// use Mail;
use Flash;
use Validator;
use Redirect;
use Uttapong\S3VideoUploader\Models\VideoUploader;
use Storage;
use Response;
use Db;

class VideoView extends ComponentBase
{

    public function componentDetails(){
        return [
            'name' => 'View all uploaded video',
            'description' => 'Video Viewer'
        ];
    }
    public function onRun(){
        $per_page = 6;
        
        $videos=VideoUploader::where('status','approved')
            ->orderBy('created_at', 'desc')
            ->limit($per_page)
            ->get();
        // print_r($videos);exit();
        $this->page['videos'] = $videos; 
    }

    public function getVideo(){
        $per_page = 6;
        $page= Input::get('page');
        
        $videos=VideoUploader::where('status','approved')
            ->orderBy('created_date', 'desc')
            ->offset(($page-1)*$per_page)
            ->limit($per_page)
            ->get();
        
        $num_page=ceil(VideoUploader::all()->count()/$per_page);
        if($page>=$num_page)$lastPage=1;
        else $lastPage=0;

        header('Content-Type: application/json');
        $resp=["lastPage"=>$lastPage,
                $videos->toArray()];
        echo json_encode($resp);
        exit();
    }
    public function onFetch(){
        $per_page = 6;
        $page= Input::get('page');
        
        $videos=VideoUploader::where('status','approved')
            ->orderBy('created_at', 'desc')
            ->offset(($page-1)*$per_page)
            ->limit($per_page)
            ->get();
        
        $num_page=ceil(VideoUploader::where('status','approved')->count()/$per_page);
        // return intval(count(VideoUploader::where('status','approved')->get()));
        // print_r($num_page);
        // exit();
        // return  Db::table('uttapong_s3videouploader_')->where('status', 'approved')->count();
        if($page>=$num_page)$lastPage=1;
        else $lastPage=0;

        header('Content-Type: application/json');
        $resp=["lastPage"=>$lastPage,
                "videos"=>$videos->toArray()];
        // exit();
        return Response::json(($resp));
        // return Input::get('page');
    }


    public function onSend(){
        

    }

}