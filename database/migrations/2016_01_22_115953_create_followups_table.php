<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateFollowupsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('followups', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('lead_id')->unsigned();
      $table->text('feedback');
      $table->text('remarks')->nullable()->default(NULL);
      $table->date('followup_date')->default(Carbon::now()->addDays(2)->format('Y-m-d'));
      $table->timestamps();
      $table->foreign('lead_id')
        ->references('id')
        ->on('leads')
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
    Schema::drop('followups');
  }
}
