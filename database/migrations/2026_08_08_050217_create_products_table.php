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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // foreign key table category
            // sql statement : foreign key ('category_id') reference categories('id')
            // on delete cascade on update cascade
            $table->foreignId('category_id')->constrained('categories')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->decimal('unit_price',10,2); 
            $table->decimal('sale_price',10,2);
            $table->longText('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
