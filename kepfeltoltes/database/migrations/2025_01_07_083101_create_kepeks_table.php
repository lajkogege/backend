<?php

use App\Models\Kepek;
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
        Schema::create('kepeks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Kepek::create(['title'=>'Tájkép', 'name'=>'kepek/kep.jpg']);
        Kepek::create(['title'=>'Város', 'name'=>'kepek/varos.jpg']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepeks');
    }
};
