<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Note;

class DeadlineNotification extends Mailable
{
    use Queueable, SerializesModels;
    protected $note;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($note)
    {
        $this->note = $note;
        
    }
    public function toMail($notifiable)
    {
        $emailContent = "Your note with the subject: " . $this->note->subject . " is almost or already expired.";
        
        return $this->subject('Note Expiration Notification')
            ->markdown('vendor.notifications.email') // This is a default Laravel notification template
            ->with([
                'note' => $this->note,
            ])
            ->line($emailContent); 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.deadline_notification');
    }
}
