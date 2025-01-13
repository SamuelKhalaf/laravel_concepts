<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification emails to all users every day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            try {
                $details = [
                    'title' => 'Notify Email',
                    'body' => 'Hello, ' . $user->name . '! This is a test email sent using Mailtrap.'
                ];

                Mail::to($user->email)->send(new NotifyEmail($details));
                Log::info("Email sent to: {$user->email}");

                // Optional: Remove sleep for better performance
                sleep(1);
            } catch (\Exception $e) {
                Log::error("Failed to send email to: {$user->email}. Error: " . $e->getMessage());
                $this->error("Failed to send email to: {$user->email}");
            }
        }

        $this->info('Notification emails have been sent to all users.');
    }
}
