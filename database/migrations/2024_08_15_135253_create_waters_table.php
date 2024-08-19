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
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('water_companies')->onDelete('cascade');
            $table->string('company_person')->nullable();
            $table->string('purpose')->nullable();
            $table->decimal('coord_x', 10, 7)->nullable();
            $table->decimal('coord_y', 10, 7)->nullable();
            $table->string('specimen')->nullable();
            $table->string('type')->nullable();
            $table->string('weather')->nullable();
            $table->string('temp')->nullable();
            $table->string('extent')->nullable()->nullable();
            $table->json('alinis_sekli')->nullable()->nullable();
            $table->string('tip')->nullable();
            $table->decimal('ph', 5, 2)->nullable();
            $table->decimal('head', 5, 2)->nullable();
            $table->decimal('eh', 5, 2)->nullable();
            $table->decimal('ec', 5, 2)->nullable();
            $table->decimal('tds', 5, 2)->nullable();
            $table->decimal('salt', 5, 2)->nullable();
            $table->decimal('resistance', 5, 2)->nullable();
            $table->decimal('oxygen', 5, 2)->nullable();
            $table->decimal('oxygenS', 5, 2)->nullable();
            $table->decimal('flow', 5, 2)->nullable();
            $table->decimal('water', 5, 2)->nullable();
            $table->decimal('fountain', 5, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('image_path')->nullable()->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waters');
    }
};
