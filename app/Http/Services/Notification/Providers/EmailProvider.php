<?php
namespace App\Http\Services\Notification\Providers;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\Notification\Providers\Contracts\Provider;

class EmailProvider implements Provider
{
    private $user;
    private $mailable;


    public function __construct(User $user, Mailable $mailable)
    {
        $this->user = $user;
        $this->mailable = $mailable;
    }

    public function send()
    {
        return Mail::to($this->user)->send($this->mailable);
    }
}
