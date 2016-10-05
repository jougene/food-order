<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyGoodIdTableOrderedGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordered_goods', function (Blueprint $table) {
            $table->foreign('good_id')->references('id')->on('goods');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_goods', function (Blueprint $table) {
            $table->dropForeign('ordered_goods_good_id_foreign');
            $table->dropForeign('ordered_goods_order_id_foreign');
        });
    }
}
