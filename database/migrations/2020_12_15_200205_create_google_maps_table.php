<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_maps', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('mark_name')->nullable();
            $table->text('mark_description')->nullable();
            $table->string('mark_logo')->nullable();
            $table->string('latitude')->nullable();
            $table->string('langitude')->nullable();
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
        Schema::dropIfExists('google_maps');
    }
}
