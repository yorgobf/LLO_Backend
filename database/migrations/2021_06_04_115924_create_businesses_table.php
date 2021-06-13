<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
                $table->string('name',40);//done
                $table->bigInteger('hosted_by')->unsigned();
                $table->index('hosted_by');
                $table->string('hostname',100);
                $table->string('category',100);//done
                $table->string('location',100);//done
                $table->string('location_coordinate',350);//done
                $table->integer('price_adults');//done
                $table->integer('price_kids');//done
                $table->string('description',1000);//done
                $table->string('photo_url',500);
                $table->string('phone_num',500);
                $table->boolean('wifi');
                $table->boolean('toilets');
                $table->boolean('water');
                $table->boolean('parking');
                $table->boolean('shower');
                $table->boolean('fire');
                $table->boolean('lessons')->default(false);//done
                $table->string('lessons_details')->nullable(true);//done
                $table->timestamps();

                $table->foreign('hosted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
