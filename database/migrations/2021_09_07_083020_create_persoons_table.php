<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persoons', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam');
            $table->string('familienaam');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('bus')->nullable();
            $table->string('postcode');
            $table->string('gemeente');
            $table->string('telefoon')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email')->nullable(); 
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
        Schema::dropIfExists('persoons');
    }
}
