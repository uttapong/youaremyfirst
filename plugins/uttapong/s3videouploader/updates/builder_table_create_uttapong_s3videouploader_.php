<?php namespace Uttapong\S3videouploader\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUttapongS3videouploader extends Migration
{
    public function up()
    {
        Schema::create('uttapong_s3videouploader_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 200);
            $table->string('submitter', 200);
            $table->string('email', 100);
            $table->string('tel', 40);
            $table->string('filename', 200)->nullable();
            $table->string('s3url', 400)->nullable();
            $table->string('status', 10);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('uttapong_s3videouploader_');
    }
}
