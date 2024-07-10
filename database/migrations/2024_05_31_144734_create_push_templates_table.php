<?php

use App\Models\AdminNotification;
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
        Schema::create('push_templates', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('content');
            $table->foreignIdFor(
                    AdminNotification::class
            )->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('push_templates');
    }
};
