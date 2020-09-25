<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('resume_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained()->cascadeOnDelete();
            $table->boolean('stack_overflow');
            $table->boolean('cv');
            $table->boolean('address');
            $table->boolean('phone');
            $table->boolean('github');
            $table->boolean('linked_in');
            $table->boolean('facebook');
            $table->boolean('instagram');
            $table->boolean('twitter');
            $table->boolean('snapchat');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_settings');
    }
}
