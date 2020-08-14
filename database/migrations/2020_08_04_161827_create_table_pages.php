<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->text('content');
            $table->timestamps();
        });

        \DB::table('pages')->insert(['alias' => 'email', 'content'=>'werowkin@gmail.com']);
        \DB::table('pages')->insert(['alias' => 'title', 'content'=>'hello one']);
        \DB::table('pages')->insert(['alias' => 'desc', 'content'=>'hello two']);
        \DB::table('pages')->insert(['alias' => 'phone', 'content'=>'+7232323']);
        \DB::table('pages')->insert(['alias' => 'vk', 'content'=>'vklink']);
        \DB::table('pages')->insert(['alias' => 'inst', 'content'=>'instlink']);
        \DB::table('pages')->insert(['alias' => 'maintitle', 'content'=>'Natalya Lebedeva']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
