<?php

namespace App\Mail\Users;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class UserInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $sender;
    public User $receiver;
    public string $password;
    public string $loginUrl;

    public function __construct(User $sender, User $receiver, string $password, string $loginUrl)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->password = $password;
        $this->loginUrl = $loginUrl;
    }

    public function build(): UserInvitationMail
    {
        return $this
            ->from($this->sender->email, $this->sender->name)
            ->to($this->receiver->email, $this->receiver->name)
            ->markdown('mails/users/user-invitation-mail');
    }
}
