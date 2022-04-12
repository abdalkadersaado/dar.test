<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_image')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('status_password')->default(0);
            $table->text('bio')->nullable();
            $table->unsignedTinyInteger('receive_email')->default(0);

            //emirates id
            $table->string('emirates_id')->nullable();
            $table->integer('id_number')->nullable();
            $table->string('expiry_date')->nullable();
            // passport
            $table->string('passport_image')->nullable();
            $table->integer('passport_number')->nullable();
            // $table->string('release_date')->nullable();
            $table->string('expiry_date_passport')->nullable();

            //معلومات الشركة company's Information
            $table->string('company_name')->nullable();
            $table->string('license_number')->nullable();
            $table->string('Commercial_Register')->nullable();
            $table->string('MOA')->nullable();

            //contract Details
            $table->string('date_contract')->nullable();
            $table->string('contract_pdf')->nullable();
            // $table->text('about_company')->nullable();
            // $table->text('about_owner_company')->nullable();
            // $table->text('partners_company')->nullable();

            //Status order
            $table->string('status_order')->nullable();
            //assign_editor
            $table->string('assign_editor')->nullable();
            $table->integer('client_top')->default(0);
            $table->integer('sequential_order')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
