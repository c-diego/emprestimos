<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('loans', function (Blueprint $table) {
      $table->id();
      $table->date('start_date');
      $table->date('end_date');
      $table->boolean('has_ended');
      $table->timestamps();
      $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
      $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('loans');
  }
};
