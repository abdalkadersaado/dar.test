<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentFinancialReportForAdminNotify extends Notification
{
    use Queueable;

    protected $comment;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->comment->id,
            'name'              => auth()->user()->name,
            'email'             => auth()->user()->email,
            'comment'           => $this->comment->comment,
            'financial_report_id'           => $this->comment->financial_report_id,
            'user_id'         => auth()->user()->id,
            'created_at'        => $this->comment->created_at->format('d M, Y h:i a'),
        ];
    }
}
