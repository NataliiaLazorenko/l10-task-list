<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // `up` method is responsible for going forward. It creates the table with columns `id` and `timestamps`
    public function up(): void
    {
        // 'create' method will create 'tasks' table, which would be, by default, connected to the model
        // The name of the table would be lowercased and it would be model name with suffix of `s`
        // (Laravel will create a plural form of our singular name of our model)

        // First argument - the table name, second - function, which gets Blueprint class instance ('table' object)
        // It has additional methods,which lets us define what columns should the table have
        Schema::create('tasks', function (Blueprint $table) {
            // 'id' would use the Laravel default way of creating an identifier for a table, which should be a primary key
            // primary key - something that lets us uniquely identify every record in a database table. It is always index
            $table->id();

            // 'title', 'description', 'long_description' and 'completed' are the columns, added by us manually
            $table->string('title');
            $table->text('description');
            // nullable - shows that long_description is optional
            $table->text('long_description')->nullable();
            $table->boolean('completed')->default(false);

            // 'timestamps' method will create 2 columns: 'created_at' and 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // If we rollback the migration, the `down` method will be called and it will drop the whole table from the database
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
