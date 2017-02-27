<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('private_messages', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('author_id')->unsigned();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('recipient_id')->unsigned();
			$table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade');
			$table->text('content');
			$table->boolean('read')->default(false);
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
		Schema::drop('private_messages');
    }
}
