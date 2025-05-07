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
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who found it
            $table->string('item_name');
            $table->text('description')->nullable();
            $table->string('location_found');
            $table->date('date_found');
            $table->string('image_path')->nullable(); // optional: image upload
            $table->enum('status', ['unclaimed', 'claimed'])->default('unclaimed');
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
        Schema::dropIfExists('lost_items');
    }
};
