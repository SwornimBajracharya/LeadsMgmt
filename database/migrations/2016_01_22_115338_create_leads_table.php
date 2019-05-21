<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('leads', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('counselor_id')->unsigned()->nullable();
      $table->string('name', 50);
      $table->string('email');
      $table->string('phone')->nullable()->default(NULL);
      $table->string('mobile_phone');
      $table->text('address')->nullable()->default(NULL);
      $table->enum('status', ['active', 'expired', 'dismissed', 'postponed'])->default('active');
      $table->boolean('is_student')->default(0);
      $table->integer('semester')->unsigned()->nullable()->default(NULL);
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('counselor_id')
        ->references('id')
        ->on('counselors')
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
    Schema::drop('leads');
  }
}
