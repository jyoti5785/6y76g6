<?php
namespace App\Notifications;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
class VerifyApiEmail extends VerifyEmailBase
{
/**
* Get the verification URL for the given notifiable.
*
* @param mixed $notifiable
* @return string
*/
protected function verificationUrl($notifiable)
{
return URL::temporarySignedRoute(
'verificationapi.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
); // this will basically mimic the email endpoint with get request
}
public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject(Lang::get('Welcome to Move In History'))
            ->line(Lang::get('To complete your registration please click on the link below to activate your account:'))
            ->action(Lang::get('Verify Email Address'), $verificationUrl)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }

}
