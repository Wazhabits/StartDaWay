<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 1000);
            $table->string('logo', 500);
            $table->string('website', 200);
            $table->string('email', 150);
            $table->string('phone', 15);
            $table->string('ad_nbr', 4);
            $table->string('ad_type', 40);
            $table->string('ad_name', 300);
            $table->string('ad_pc', 5);
            $table->string('ad_city', 100);
            $table->integer('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
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
        Schema::dropIfExists('organizations');
    }
}
