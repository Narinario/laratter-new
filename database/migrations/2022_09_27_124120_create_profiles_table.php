<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('profile', 255)->nullable();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->unique('user_id');
        $table->timestamps();
        });
    }
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
        $table->dropColumn('profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
};
