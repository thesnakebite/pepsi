<?php

namespace App\Front\Promotions\Notifications;

use App\Twill\Capsules\Refrescos\Models\Refresco;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RefrescoWinnerConfirmation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $participation;
    protected $emailData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Refresco $participation)
    {
        $this->participation = $participation;

        $emailRepository = app()->make('App\Twill\Capsules\Refrescos\Repositories\RefrescoEmailRepository');
        $this->emailData = $emailRepository->getEmailParsedByType('winners', $this->participation);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->emailData['subject'])
                    ->markdown('mail.refrescos.winner_confirmation', $this->emailData);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}