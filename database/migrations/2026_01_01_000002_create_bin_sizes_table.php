<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bin_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('capacity_m3', 4, 1);
            $table->unsignedSmallInteger('wheelie_bins_equiv');
            $table->string('dimensions', 100);
            $table->decimal('base_price', 10, 2);
            $table->text('description');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bin_sizes');
    }
};
