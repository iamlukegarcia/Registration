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
        Schema::create('taxpayers', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('rank');
            $table->string('CompanyName');
            $table->string('GuestName');
            $table->string('Table#');
            $table->string('Usher');
            $table->string('Batch#');
            $table->string('LOC');
            $table->string('REMARKS');
            $table->string('confirmed');
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
        Schema::dropIfExists('taxpayers');
    }
};
