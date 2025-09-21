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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->foreign("event_id")->references("id")->on("events")->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger("worker_id");
            $table->foreign("worker_id")->references("id")->on("workers")->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean("permit")->default(false);
            $table->string("memo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatches');
    }
};
