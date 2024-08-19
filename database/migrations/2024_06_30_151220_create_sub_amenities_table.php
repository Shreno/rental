<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAmenitiesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('primary_amenity_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['numeric', 'select', 'multiselect', 'boolean', 'dimension']);
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_amenities');
    }
}
