<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_ref', 20)->unique();
            $table->foreignId('suburb_id')->constrained('suburbs')->restrictOnDelete();
            $table->foreignId('bin_size_id')->constrained('bin_sizes')->restrictOnDelete();
            $table->foreignId('waste_type_id')->constrained('waste_types')->restrictOnDelete();
            $table->string('customer_name', 150);
            $table->string('customer_phone', 25);
            $table->string('customer_email', 150)->index();
            $table->string('delivery_address', 255);
            $table->enum('placement_location', ['driveway', 'nature_strip'])->default('driveway');
            $table->date('delivery_date')->index();
            $table->date('pickup_date');
            $table->unsignedSmallInteger('total_days');
            $table->decimal('base_amount', 10, 2);
            $table->decimal('delivery_fee', 10, 2);
            $table->decimal('extra_days_fee', 10, 2)->default(0.00);
            $table->decimal('gst_amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'delivered', 'picked_up', 'cancelled'])->default('confirmed')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
