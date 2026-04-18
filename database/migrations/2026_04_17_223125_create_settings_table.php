<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // --- Evento STI ---
            $table->string('event_name')->default('')->nullable();
            $table->string('event_edition_number')->default('')->nullable();
            $table->string('event_edition_roman')->default('')->nullable();
            $table->year('event_year')->default(date('Y'));
            $table->date('event_dates_from')->nullable();
            $table->date('event_dates_to')->nullable();
            $table->string('event_city')->default('')->nullable();

            // --- Organización ---
            $table->string('org_name')->default('')->nullable();
            $table->string('org_short_name')->default('')->nullable();
            $table->string('org_nit')->default('')->nullable();
            $table->string('org_municipality')->default('')->nullable();
            $table->string('org_control_body')->default('')->nullable();
            $table->string('org_chamber_city')->default('')->nullable();

            // --- Representante Legal ---
            $table->string('org_rep_name')->default('')->nullable();
            $table->string('org_rep_cc')->default('')->nullable();
            $table->string('org_rep_cc_city')->default('')->nullable();

            // --- Contador Público ---
            $table->string('org_accountant_name')->default('')->nullable();
            $table->string('org_accountant_tp')->default('')->nullable();
            $table->string('org_accountant_cc')->default('')->nullable();

            // --- Cuenta Bancaria ---
            $table->string('org_bank_name')->default('')->nullable();
            $table->string('org_bank_account')->default('')->nullable();
            $table->string('org_account_type')->default('ahorros');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
