<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->text('content');
            $table->timestamps();
        });

        \DB::table('about')->insert(['alias' => 'email', 'content'=>'werowkin@gmail.com']);
        \DB::table('about')->insert(['alias' => 'title', 'content'=>'hello one']);
        \DB::table('about')->insert(['alias' => 'desc', 'content'=>'hello two']);
        \DB::table('about')->insert(['alias' => 'phone', 'content'=>'+7232323']);
        \DB::table('about')->insert(['alias' => 'vk', 'content'=>'vklink']);
        \DB::table('about')->insert(['alias' => 'inst', 'content'=>'instlink']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
