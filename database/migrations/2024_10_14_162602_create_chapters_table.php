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
        Schema::create('chapters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('chapter_name');
            $table->text('chapter_order');
            $table->uuid('material_id')->constrained(
                table: 'materials',
                indexName: 'chapters_material_id_foreign'
            );
            $table->foreignId('sub_chapter_id')->constrained(
                table: 'sub_chapters',
                indexName: 'chapters_sub_chapter_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
