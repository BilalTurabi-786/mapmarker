<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contact_us_id')->unsigned();
            $table->string('code', 65)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_expired')->default(false);
            $table->unique(['code', 'contact_us_id']);
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
        Schema::dropIfExists('school_requests');
    }
}
