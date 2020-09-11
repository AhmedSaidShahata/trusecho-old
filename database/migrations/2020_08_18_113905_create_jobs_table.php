<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('lang');
            $table->string('title');
            $table->text('description');
            $table->text('picture_company');
            $table->string('location');
            $table->text('requirments');
            $table->date('deadline');
            $table->string('email');
            $table->integer('salary');
            $table->string('contact');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('specialization_id');
            $table->string('company');
            $table->text('picture');
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
