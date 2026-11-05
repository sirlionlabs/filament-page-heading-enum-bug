<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32)->default('system');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        $now = now();

        DB::table('posts')->insert([
            ['type' => 'system', 'is_active' => true,  'created_at' => $now, 'updated_at' => $now],
            ['type' => 'api',    'is_active' => true,  'created_at' => $now, 'updated_at' => $now],
            ['type' => 'system', 'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
