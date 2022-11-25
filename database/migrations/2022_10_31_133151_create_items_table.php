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
    Schema::create('items', function (Blueprint $table) {
      $table->id();
      $table->string('image')->default('https://dummyimage.com/160x160/5c5c5c/fff');
      $table->string('title');
      $table->text('description')->nullable();
      $table->boolean('is_available');
      $table->integer('days_available');
      $table->string('observation')->nullable();
      $table->integer('amount');
      $table->foreignId('sector_id')->constrained()->onDelete('cascade');
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
    Schema::dropIfExists('items');
  }
};
