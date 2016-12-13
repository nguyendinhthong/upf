<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_links', function (Blueprint $table) {
            $table->increments('id');         
            $table->string('filename');
            $table->string('fileextension');
            $table->string('filecode')->unique();
            $table->string('ipuploaded');
            $table->string('downloadlink');            
            $table->string('displaylink');            
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
        Schema::dropIfExists('file_links');
    }
}
