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
        Schema::create('eisenhowers', function (Blueprint $table) {
            $table->id();
            $table->string('todo');
            $table->text('comment')->nullable();
            $table->date('endDate');
            $table->integer('color');
            $table->enum('status',[0,1])->default(0);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eisenhowers');
    }
};
