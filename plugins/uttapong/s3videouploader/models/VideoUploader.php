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

    protected $appends = array('thaidate');

    public function getThaidateAttribute(){
        $strDate=$this->created_at;
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
		// return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	
    }
}
