<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStrAttrsGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function ($table) {
            $table->string('name', 255)->change();
            $table->string('description', 255)->change();
            $table->string('image', 255)->change();
            $table->string('category', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function ($table) {
            $table->string('name')->change();
            $table->string('description')->change();
            $table->string('image')->change();
            $table->string('category')->change();
        });
    }
}
