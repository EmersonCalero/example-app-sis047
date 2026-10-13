<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedInteger('stock')->default(0)->after('precio');
            $table->foreignId('almacen_id')->nullable()->after('stock')
                  ->constrained('almacenes')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('almacen_id');
            $table->dropColumn('stock');
        });
    }
};
