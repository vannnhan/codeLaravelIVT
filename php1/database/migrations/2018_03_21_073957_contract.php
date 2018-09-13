<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->string('co_id')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_work')->nullable();
            $table->string('value')->nullable();
            $table->string('status')->nullable();
            $table->date('day_begin')->nullable();
            $table->date('day_end')->nullable();
            $table->string('progress')->nullable();
            $table->string('send_email_confim')->nullable();
            $table->string('send_mail_5day')->nullable();
            $table->string('send_mail_2day')->nullable();
            $table->mediumText('note')->nullable();
            $table->string('created_month')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
