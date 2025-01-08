<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dasarelektronikas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nim');
            $table->string('name', 50);
            $table->string('pract_group', 20);
            $table->integer('report_1')->nullable();
            $table->integer('pract_1')->nullable();
            $table->integer('total_1')->nullable();
            $table->integer('report_2')->nullable();
            $table->integer('pract_2')->nullable();
            $table->integer('total_2')->nullable();
            $table->integer('report_3')->nullable();
            $table->integer('pract_3')->nullable();
            $table->integer('total_3')->nullable();
            $table->integer('report_4')->nullable();
            $table->integer('pract_4')->nullable();
            $table->integer('total_4')->nullable();
            $table->integer('report_5')->nullable();
            $table->integer('pract_5')->nullable();
            $table->integer('total_5')->nullable();
            $table->integer('report_6')->nullable();
            $table->integer('pract_6')->nullable();
            $table->integer('total_6')->nullable();
            $table->integer('report_7')->nullable();
            $table->integer('pract_7')->nullable();
            $table->integer('total_7')->nullable();
            $table->integer('report_8')->nullable();
            $table->integer('pract_8')->nullable();
            $table->integer('total_8')->nullable();
            $table->integer('total_score')->nullable();
            $table->integer('resp')->nullable();
            $table->integer('final_score')->nullable();
            $table->string('grade', 3)->nullable();
            $table->integer('attend_sos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dasarelektronikas');
    }
};
