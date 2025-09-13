<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->char('user_ULID', 26)->nullable();
            $table->foreign('user_ULID')->references('ULID')->on('users')->onDelete('set null');//NULL許可、ログイン機能実装後消す
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memos');
    }
};
