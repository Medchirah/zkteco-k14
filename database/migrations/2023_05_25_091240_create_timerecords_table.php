<?php

use App\Models\device;
use App\Models\employe;
use App\Models\shifttime;
use App\Models\tabletime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timerecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('device_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tabletime_id')->constrained()->cascadeOnDelete();
            $table->time('time_in');
            $table->time('time_out');
            $table->time('durration')->default('00:00:00');
            $table->time('late_in')->default('00:00:00');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timerecords');
    }
};
