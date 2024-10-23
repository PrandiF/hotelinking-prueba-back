<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('offer_id')->constrained('offers')->onDelete('cascade');
            $table->boolean('is_redeemed')->default(false); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
}
