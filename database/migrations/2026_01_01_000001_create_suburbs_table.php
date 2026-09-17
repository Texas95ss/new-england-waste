<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suburbs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('postcode', 10)->index();
            $table->decimal('delivery_fee', 10, 2)->default(0.00);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suburbs');
    }
};
