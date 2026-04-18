<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->foreignId('sponsor_package_id')
                ->nullable()
                ->after('amount')
                ->constrained('sponsor_packages')
                ->nullOnDelete();

            $table->dropColumn('sponsor_package');
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['sponsor_package_id']);
            $table->dropColumn('sponsor_package_id');
            $table->string('sponsor_package')->nullable()->after('amount');
        });
    }
};
