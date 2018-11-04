<?php namespace Uttapong\S3videouploader\Models;

use Model;

/**
 * Model
 */
class VideoUploader extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'uttapong_s3videouploader_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
