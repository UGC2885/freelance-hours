<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the 'projects' table in the database
        Schema::create('projects', function (Blueprint $table) {
            // Creates an auto-incrementing ID column as the primary key
            $table->id();
            // Creates a 'title' column of type string (VARCHAR) to store the project title
            $table->string('title');
            // Creates a 'description' column of type text (TEXT) to store the project's detailed description
            $table->text('description');
            // Creates a 'ends_at' column of type datetime to store the project's end date and time
            $table->dateTime('ends_at');
            // Creates a 'status' column of type string with a default value of 'open', to indicate the project status
            $table->string('status')->default('open');
            // Creates a 'tech_stack' column of type JSON to store the list of technologies used in the project
            $table->json('tech_stack');
            // Creates a foreign key 'created_by', linking to the 'users' table, referencing the user who created the project
            $table->foreignIdFor(User::class, 'created_by')->constrained('users');
            // Adds default 'created_at' and 'updated_at' timestamp columns for record creation and updates
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
