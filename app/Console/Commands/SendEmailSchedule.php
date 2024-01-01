<?php

namespace App\Console\Commands;

use App\Mail\NotifyManagerEmail;
use App\Models\Manager;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendEmailSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate the email automatically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $messages = Message::whereDate('created_at', now()->toDateString())->get();
    
        foreach ($messages as $message) {

            $managers = Manager::where('id', '!=', $message->manager_id)
                ->whereHas('projects', fn($q) => $q->where('id','!=',$message->project_id))
                ->get();
    
            }
            foreach ($managers as $manager) {
                Mail::to($manager->email)->send(new NotifyManagerEmail($manager));
                $this->info('Email sent to ' . $manager->email);
            }
        $this->info('Hourly Update emails have been sent successfully');
    }
    
}
