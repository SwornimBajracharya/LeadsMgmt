<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounselorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('counselors', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->string('contact_no')->nullable()->default(NULL);
      $table->text('address')->nullable()->default(NULL);
      $table->text('notes')->nullable()->default(NULL);
      $table->timestamps();
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('counselors');
  }
}
