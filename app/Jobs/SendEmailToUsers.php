<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Services\Message\MessageService;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Http\Services\Message\Email\EmailService;

class SendEmailToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $email;
    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $users)
    {
        $this->email = $email;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->users->count() > 0) {
            foreach ($this->users as $email) {

                $emailService = new EmailService();
                $details = [
                    'title' => $this->email->subject,
                    'body' => $this->email->body,
                ];

                $filePaths = [];

                
                foreach ($this->email->files()->where('status', 1)->get('file_path') as $file) {
                    array_push($filePaths, $file->file_path);
                }

                $emailService->setDetails($details);
                $emailService->setFrom('noreply@example.com', 'DigiKala');
                $emailService->setSubject($this->email->subject);
                $emailService->setTo($email);
                $emailService->setEmailFiles($filePaths);

                $messageService = new MessageService($emailService);

                try {
                    $messageService->send();
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    continue;
                }
            }
        }
    }
}
