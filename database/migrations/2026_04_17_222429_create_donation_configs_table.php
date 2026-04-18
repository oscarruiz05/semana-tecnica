<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_configs', function (Blueprint $table) {
            $table->id();

            // Evento
            $table->string('event_name');
            $table->string('event_edition_number');
            $table->string('event_edition_roman');
            $table->year('event_year');
            $table->date('event_dates_from');
            $table->date('event_dates_to');
            $table->string('event_city');

            // Organización ASIPEUSCO
            $table->string('org_name');
            $table->string('org_short_name');
            $table->string('org_nit');
            $table->string('org_municipality');
            $table->string('org_control_body');
            $table->string('org_chamber_city');

            // Representante Legal
            $table->string('org_rep_name');
            $table->string('org_rep_cc');
            $table->string('org_rep_cc_city');

            // Contador
            $table->string('org_accountant_name');
            $table->string('org_accountant_tp');
            $table->string('org_accountant_cc');

            // Banco
            $table->string('org_bank_name');
            $table->string('org_bank_account');
            $table->string('org_account_type')->default('ahorros');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_configs');
    }
};
