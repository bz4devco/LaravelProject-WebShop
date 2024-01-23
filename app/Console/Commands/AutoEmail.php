<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Notify\Email;
use App\Jobs\SendEmailToUsers;
use Illuminate\Console\Command;

class AutoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:sendEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command created for send mails in published at date for users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(User $userModel)
    {
        $users = $userModel->ActivatedUsersEmail();
        
        if ($users->count() > 0) {
            $eamilsToSend = Email::where('status', 1)->where('published_at', '=', now())->get();
            foreach ($eamilsToSend as $eamilToSend) {
                SendEmailToUsers::dispatch($eamilToSend, $users);
            }
        }
    }
}
