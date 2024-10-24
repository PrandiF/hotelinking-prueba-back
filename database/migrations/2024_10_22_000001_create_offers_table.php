<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('valid_until');
            $table->string('status')->default('habilitado');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
