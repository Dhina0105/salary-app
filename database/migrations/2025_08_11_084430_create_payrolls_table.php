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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->enum('type',['weekly','monthly']);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_hours',10,2)->nullable();
            $table->decimal('amount',12,2);
            $table->timestamps();
             $table->unique(['employee_id','start_date','end_date','type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
