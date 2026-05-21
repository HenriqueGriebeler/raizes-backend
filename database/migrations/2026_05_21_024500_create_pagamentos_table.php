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
    Schema::create('pagamentos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pedido_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('metodo');
        $table->string('status');

        $table->decimal('valor', 10, 2);

        $table->json('payload_mock')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
