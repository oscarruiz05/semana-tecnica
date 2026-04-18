<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedule_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->default('charla');
            $table->foreignId('speaker_id')->nullable()->constrained('speakers')->nullOnDelete();
            $table->date('day');
            $table->time('time_start');
            $table->time('time_end')->nullable();
            $table->string('place')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule_items');
    }
};
