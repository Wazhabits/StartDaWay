<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 300);
            $table->string('description', 1000);
            $table->string('duration', 25);
            $table->date('date');
            $table->integer('nb_reply');
            $table->integer('nb_job');
            $table->integer('org_id');
            $table->integer('exp_id');
            $table->integer('type_id');
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('exp_id')->references('id')->on('experiences');
            $table->foreign('type_id')->references('id')->on('type');
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
        Schema::dropIfExists('jobs');
    }
}
