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
        Schema::create('sub_chapters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sub_chapter_name');
            $table->text('sub_chapter_order');
            $table->foreignUuid('chapter_id')->constrained(
                table: 'chapters',
                indexName: 'sub_chapters_chapter_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_chapters');
    }
};
