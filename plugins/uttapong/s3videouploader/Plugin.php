<?php namespace Uttapong\S3videouploader;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Uttapong\S3VideoUploader\Components\VideoPush' => 'videopush',
            'Uttapong\S3VideoUploader\Components\VideoView' => 'videoview'
        ];
    }

    public function registerSettings()
    {
    }

    /**
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'locationPluginEnabled' => function () {
                    return PluginManager::instance()->exists('RainLab.Location');
                },
                'subStrThai' => function ($msg,$length) {
                    return mb_substr($msg, 0, $length, 'UTF-8');
                },
            ],
        ];
    }
}
