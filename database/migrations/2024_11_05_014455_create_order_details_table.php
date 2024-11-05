<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('external_id', 50);
            $table->string('no_transaction')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->default(0)->nullable();
            $table->string('unique_code', 10)->default(Str::random(10));
            $table->decimal('tax', 8, 2)->default(11 / 100)->nullable();
            $table->decimal('service_charge', 8, 2)->default(10000);
            $table->decimal('total_price', 8, 2)->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('status')->default('pending');
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'order_details_user_id_foreign'
            );
            $table->foreignId('course_id')->nullable()->constrained(
                table: 'courses',
                indexName: 'order_details_course_id_foreign'
            );
            $table->foreignUuid('webinar_id')->constrained(
                table: 'webinars',
                indexName: 'order_details_webinar_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
