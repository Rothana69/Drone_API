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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->float('latitude');
            $table->float('longitude');
            $table->unsignedBigInteger('farm_id');
            $table->foreign("farm_id")
            ->references("id")
            ->on("farms")
            ->onDelete('cascade');
            $table->unsignedBigInteger('drone_id');
            $table->foreign("drone_id")
            ->references("id")
            ->on("drones")
            ->onDelete('cascade');
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
