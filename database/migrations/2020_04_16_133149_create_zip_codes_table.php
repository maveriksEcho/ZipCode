<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('zip')->unique();
            $table->float('lat', 8,5);
            $table->float('lng', 8,5);
            $table->string('city');
            $table->string('state_id', 2);
            $table->string('state_name');
            $table->boolean('zcta')->default(true);
            $table->string('parent_zcta')->nullable();
            $table->integer('population');
            $table->float('density');
            $table->integer('county_fips');
            $table->string('county_name');
            $table->json('county_weights');
            $table->string('county_names_all');
            $table->string('county_fips_all');
            $table->boolean('imprecise')->default(false);
            $table->boolean('military')->default(false);
            $table->string('timezone');
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
        Schema::dropIfExists('zip_codes');
    }
}
