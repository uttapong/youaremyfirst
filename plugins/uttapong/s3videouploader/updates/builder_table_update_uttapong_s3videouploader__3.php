<?php namespace Uttapong\S3videouploader\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUttapongS3videouploader3 extends Migration
{
    public function up()
    {
        Schema::table('uttapong_s3videouploader_', function($table)
        {
            $table->string('thumbnail', 200)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('uttapong_s3videouploader_', function($table)
        {
            $table->text('thumbnail')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
