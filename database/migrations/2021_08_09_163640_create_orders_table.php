<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('item_id');
//            $table->foreign('item_id')
//                ->references('id')
//                ->on('items')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();

            $table->unsignedBigInteger('men_id');
            $table->foreign('men_id')
                ->references('id')
                ->on('men')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('place_id');

            $table->foreign('place_id')
                ->references('id')
                ->on('places')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

//            $table->integer('quantity');

            $table->string('invoiceNo')->default(0);


//            $table->text('place')->nullable();




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
        Schema::dropIfExists('orders');
    }
}
