<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsOtvetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_otvet', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('comment_id')->unsigned();
			$table->foreign('comment_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');
			$table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_otvet');
    }
}
