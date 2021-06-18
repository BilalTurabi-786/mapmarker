<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchoolFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //school_filters
        Schema::create('school_filters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_id')->unsigned();
            $table->string('sports', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->double('price');
            $table->integer('student_teacher_ratio');
            $table->string('course_level', 100);
            $table->boolean('is_lesson')->default(false);
            $table->boolean('is_camp')->default(false);
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
        //
        Schema::dropIfExists('school_filters');
    }
}
