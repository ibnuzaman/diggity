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
        Schema::create('sub_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sub_material_name');
            $table->integer('sub_material_order');
            $table->integer('sub_material_count');
            $table->foreignUuid('material_id')->constrained(
                table: 'materials',
                indexName: 'sub_materials_material_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_materials');
    }
};
