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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('visibility_id');
            $table->foreign('visibility_id')->references('id')->on('visibilities')->default(1);
        });
        Schema::table('places', function (Blueprint $table) {
            $table->unsignedBigInteger('visibility_id');
            $table->foreign('visibility_id')->references('id')->on('visibilities')->default(1);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table) {
            $table->dropColumn('visibility_id');
        });
        Schema::table('places', function($table) {
            $table->dropColumn('visibility_id');
        });
    }
};
