<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoChangesTable extends Migration
{
    public function up()
    {
        Schema::create('logo_changes', function (Blueprint $table) {
            $table->id();
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logo_changes');
    }
}