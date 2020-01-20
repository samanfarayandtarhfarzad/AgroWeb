<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirms', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('email', 60)->nullable()->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('phone', 12)->nullable()->unique()->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('code', 4);
            $table->boolean('sent_email')->default(0)->autoIncrement(false);
            $table->boolean('sent_phone')->default(0)->autoIncrement(false);
            $table->dateTime('sent_date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->boolean('code_used')->default(0)->autoIncrement(false);
            $table->string('device_id')->nullable();
            $table->tinyInteger('repeat_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirms');
    }
}
