<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->string('header');
            $table->text('description');
            $table->timestamps(); // Includes created_at and updated_at
            $table->foreignId('account_id') // Foreign Key
                  ->constrained('accounts', 'id')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
