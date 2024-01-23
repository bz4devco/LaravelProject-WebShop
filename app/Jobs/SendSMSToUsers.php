<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Setting\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendSMSToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sms;
    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sms, $users)
    {
        $this->sms = $sms;
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
            $webTitle = Setting::where('status', 1)->orderBy('id','asc')->first('title') ?? 'وب سایت فروشگاهی';

            foreach ($this->users as $mobile) {
                // send sms
                $smsService = new SmsService();
                $smsService->setFrom(Config::get('sms.otp_from'));
                $smsService->setTo([$mobile]);
                $smsService->setText("$webTitle->title \n {$this->sms->title} \n ". strip_tags($this->sms->body));
                $smsService->setIsFlash(true);

                $messageService = new MessageService($smsService);

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
