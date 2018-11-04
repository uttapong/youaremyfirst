<?php namespace Uttapong\S3videouploader\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class S3VideoUploader extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Uttapong.S3videouploader', 'video-menu-item');
    }

    public function savevideo(){
        echo json_encode($_REQUEST);
        die();
    }
}
