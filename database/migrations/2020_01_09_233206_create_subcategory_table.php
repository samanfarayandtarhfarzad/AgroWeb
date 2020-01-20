<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory', function (Blueprint $table) {
            $table->smallInteger('subcategory_id')->autoIncrement(); 
            $table->tinyInteger('category_id')->autoIncrement(false); 
            $table->string('subcategory_title', 64)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('subcategory_description', 255)->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('subcategory_Privilege')->autoIncrement(false); 
            $table->boolean('subcategory_status')->default(1)->autoIncrement(false); 
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
        Schema::dropIfExists('subcategory');
    }
}
