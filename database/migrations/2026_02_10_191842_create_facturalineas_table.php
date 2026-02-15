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
        Schema::create('facturalineas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_factura')->unsigned();
            $table->integer('codigo');
            $table->decimal('cantidad', 10, 2);
            $table->string('descripcion', 50);
            $table->decimal('precio', 10, 2);
            $table->decimal('base', 19, 2);
            $table->decimal('iva', 5, 2);
            $table->decimal('importeiva', 19, 2);
            $table->decimal('importe', 19, 2);

            $table->foreign('id_factura')->references('id')->on('facturas')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturalineas');
    }
};
