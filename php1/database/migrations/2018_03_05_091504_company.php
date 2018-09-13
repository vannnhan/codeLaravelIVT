<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Company extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('co_name')->unique();
            $table->string('co_vat')->unique();
            $table->string('co_logo')->nullable()->default('logo.png');
            $table->string('co_folder')->nullable();
            $table->string('co_address')->nullable();
            $table->string('co_address_vat')->nullable();
            $table->string('co_phone')->nullable();
            $table->string('co_fax')->nullable();
            $table->string('co_mail')->nullable();
            $table->string('co_career')->nullable();
            $table->string('co_localtion')->nullable();
            $table->string('co_type')->nullable();
            $table->string('user_assign')->nullable();
            $table->string('user_created')->nullable();
            $table->mediumText('note')->nullable();
            $table->softDeletes();

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
        //
        Schema::dropIfExists('company');
    }
}
