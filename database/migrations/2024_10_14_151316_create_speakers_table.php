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
        Schema::create('speakers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('speaker_name');
            $table->string('speaker_job');
            $table->text('speaker_summary');
            $table->string('company_speaker')->notnull();
            $table->string('speaker_image')->notnull();
            $table->uuid('webinar_id')->constrained(
                table : 'webinars',
                indexName: 'speakers_webinar_id_foreign'
            );                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
