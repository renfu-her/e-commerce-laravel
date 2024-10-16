<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // 刪除舊的外鍵參考
            $table->dropForeign(['category_id']);

            // 添加新的外鍵參考，指向 categories 表
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // 刪除新的外鍵參考
            $table->dropForeign(['category_id']);

            // 添加回舊的外鍵參考，指向 menus 表
            $table->foreign('category_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }
};
