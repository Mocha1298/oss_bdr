<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oss', function (Blueprint $table) {
            $table->id();
            $table->string('inc_name');
            $table->string('inc_type');
            $table->string('pic');
            $table->string('no_pic');
            $table->string('email_pic');
            $table->string('people');
            $table->integer('people_fix')->nullable();
            $table->integer('status')->nullable();
            $table->string('voucher')->nullabel();
            $table->string('plan_date');
            $table->string('plan_time');
            $table->integer('id_site')->nullable();
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
        Schema::dropIfExists('oss');
    }
};
