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
        Schema::create('weight', function (Blueprint $table) {
            $table->bigIncrements('weight_id')->unique();
            $table->unsignedBigInteger('cases_id');
            $table->foreign('cases_id')->references('cases_id')->on('cases')->onDelete('CASCADE');
            for ($i = 1; $i <= 8; $i++) {
                $table->float('weight'.$i, 8, 6)->default(0);
            }
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
        Schema::dropIfExists('weight');
    }
};
