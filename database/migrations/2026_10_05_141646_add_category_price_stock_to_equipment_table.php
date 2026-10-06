<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryPriceStockToEquipmentTable extends Migration
{
    public function up()
    {
        Schema::table('equipment', function (Blueprint $table) {

            if (!Schema::hasColumn('equipment', 'price')) {
                $table->decimal('price', 12, 2)
                      ->default(0)
                      ->after('description');
            }

            if (!Schema::hasColumn('equipment', 'stock')) {
                $table->integer('stock')
                      ->default(0)
                      ->after('price');
            }

        });
    }

    public function down()
    {
        Schema::table('equipment', function (Blueprint $table) {

            if (Schema::hasColumn('equipment', 'price')) {
                $table->dropColumn('price');
            }

            if (Schema::hasColumn('equipment', 'stock')) {
                $table->dropColumn('stock');
            }

        });
    }
}