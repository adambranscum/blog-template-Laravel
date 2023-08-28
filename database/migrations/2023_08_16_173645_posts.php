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
            $table->bigIncrements('id');
            $table->string('post_author');
            $table->text('post_title');
            $table->text('post_tags');
            $table->text('post_excert');
            $table->text('post_header');            
            $table->timestamps();
            $table->longText('post');
            $table->string('post_status');
            
        });
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
};
