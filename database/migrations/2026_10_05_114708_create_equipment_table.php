<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('equipment', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->string('name');
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->decimal('rental_price', 12, 2);
        $table->integer('stock')->default(0);
        $table->enum('condition', ['baik', 'rusak_ringan', 'rusak_berat'])->default('baik');
        $table->enum('status', ['tersedia', 'disewa', 'perawatan'])->default('tersedia');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};
