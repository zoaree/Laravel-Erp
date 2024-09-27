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
            $table->decimal('coord_x', 18, 9)->nullable();
            $table->decimal('coord_y', 18, 9)->nullable();
            $table->string('specimen')->nullable();
            $table->string('type')->nullable();
            $table->string('weather')->nullable();
            $table->string('temp')->nullable();
            $table->string('extent')->nullable();
            $table->json('alinis_sekli')->nullable();
            $table->string('tip')->nullable();
            $table->decimal('ph', 7, 2)->nullable();
            $table->decimal('head', 7, 2)->nullable();
            $table->decimal('eh', 7, 2)->nullable();
            $table->decimal('ec', 7, 2)->nullable();
            $table->decimal('tds', 7, 2)->nullable();
            $table->decimal('salt', 7, 2)->nullable();
            $table->decimal('resistance', 7, 2)->nullable();
            $table->decimal('oxygen', 7, 2)->nullable();
            $table->decimal('oxygenS', 7, 2)->nullable();
            $table->decimal('flow', 7, 2)->nullable();
            $table->decimal('water', 7, 2)->nullable();
            $table->decimal('fountain', 7, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('image_path')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
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
