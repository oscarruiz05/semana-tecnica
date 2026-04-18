<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_config_id')->constrained()->cascadeOnDelete();

            // Documento soporte
            $table->string('document_number');
            $table->date('donation_date');

            // Empresa donante
            $table->string('company_name');
            $table->string('company_nit');
            $table->string('company_address')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_economic_activity')->nullable();

            // Donación
            $table->unsignedBigInteger('amount');
            $table->string('sponsor_package');

            // Firmante del documento soporte
            $table->string('signer_name');
            $table->string('signer_role')->nullable();
            $table->string('signer_cc')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
