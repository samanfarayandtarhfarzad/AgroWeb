<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->mediumInteger('id')->autoIncrement();
            $table->string('file_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('file_size')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('file_format')->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('file_type')->nullable();
            $table->string('file_description')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('file_address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->bigIncrements('user_id')->nullable()->autoIncrement(false);
            $table->boolean('used')->default(0)->autoIncrement(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
