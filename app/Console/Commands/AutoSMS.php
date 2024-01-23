<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Notify\SMS;
use App\Jobs\SendSMSToUsers;
use Illuminate\Console\Command;

class AutoSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:sendSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command created for send SMS in published at date for users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(User $userModel)
    {
        $users = $userModel->ActivatedUsersMobile();
        
        if ($users->count() > 0) {
            $SmsesToSend = SMS::where('status', 1)->where('published_at', '=', now())->get();
            foreach ($SmsesToSend as $SmsToSend) {
                SendSMSToUsers::dispatch($SmsToSend, $users);
            }
        }    }
}
