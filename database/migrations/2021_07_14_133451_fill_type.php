<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('types')->insert([
            ['title' => 'Книга'],
            ['title' => 'Статья'],
            ['title' => 'Видео'],
            ['title' => 'Сайт/Блог'],
            ['title' => 'Подборка'],
            ['title' => 'Ключевые идеи книги'],

        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
