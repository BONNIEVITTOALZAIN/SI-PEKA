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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pemeriksaan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('nominal', 12, 2);

            $table->string('metode');

            $table->string('bukti_bayar');

            $table->enum('status', [
                'pending',
                'diterima',
                'ditolak'
            ])->default('pending');

            $table->text('catatan')->nullable();

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
