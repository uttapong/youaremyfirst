<?php namespace Uttapong\S3videouploader;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Uttapong\S3VideoUploader\Components\VideoPush' => 'videopush',
        ];
    }

    public function registerSettings()
    {
    }
}
