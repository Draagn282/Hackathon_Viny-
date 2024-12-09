<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // Primary Key
            $table->text('description');
            $table->timestamps(); // Includes created_at and updated_at
            $table->foreignId('blog_id') // Foreign Key
                  ->constrained('blogs', 'blog_id')
                  ->onDelete('cascade');
            $table->foreignId('account_id') // Foreign Key
                  ->constrained('accounts', 'account_id')
                  ->onDelete('cascade');
            $table->foreignId('parent_comment_id')->nullable(); // Self-referencing FK for nested comments
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}