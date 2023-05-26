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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(false);
            $table->string('type');
            $table->string('battery_life');
            $table->float('weight');
            $table->float('payload');
            $table->float('max_speed');
            $table->float('max_altitude');
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete('cascade');
            $table->unsignedBigInteger('plan_id');
            $table->foreign("plan_id")
                ->references("id")
                ->on("plans")
                ->onDelete('cascade');
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
