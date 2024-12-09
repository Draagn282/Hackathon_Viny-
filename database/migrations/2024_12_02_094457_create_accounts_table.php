<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id'); // Primary Key
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
