<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->foreignId('transaction_type_id')->constrained('transaction_types')->restrictOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('need_level_id')->nullable()->constrained('need_levels')->nullOnDelete();
            $table->foreignId('income_type_id')->nullable()->constrained('income_types')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['user_id', 'transaction_type_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
