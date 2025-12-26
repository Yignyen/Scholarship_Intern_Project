<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



##creates job-related tables used by Laravel’s Queue system.   job is a background task,  Sending emails,  Processing files  , Running heavy calculations, Notifications

##Instead of slowing the user request, Laravel queues these tasks.

##Instead of making the user wait while these tasks run, Laravel queues them to execute in the background.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //Stores individual queued jobs.


        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();//queue name
            $table->longText('payload');  //job data
            $table->unsignedTinyInteger('attempts');   //retry attempts
            $table->unsignedInteger('reserved_at')->nullable();   //time reserve
            $table->unsignedInteger('available_at');  //when it is availbel
            $table->unsignedInteger('created_at');  //creates time stamps
        });
            // Stores batch jobs, if multiple jobs are grouped

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });


        //Stores jobs that fail after retries.

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * for rollback;- drops all three tables when roll back.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
