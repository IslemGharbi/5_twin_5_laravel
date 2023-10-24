<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Note;
use Carbon\Carbon;

class SendDeadlineNotifications extends Command
{
    protected $signature = 'notifications:send';
    protected $description = 'Send email notifications for almost expired notes.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $notes = Note::whereDate('deadline', '>=', now())->whereDate('deadline', '<=', now()->addDays(1))->get();

        foreach ($notes as $note) {
            // Calculate the time remaining until the deadline.
            $timeRemainingHours = Carbon::now()->diffInHours($note->deadline);

            // Check if the deadline is within 24 hours.
            if ($timeRemainingHours <= 24) {
                // Send email notification using Laravel's Mail facade.
                Mail::to($note->user->email)->send(new DeadlineNotification($note));
            }
        }

        $this->info('Email notifications sent successfully.');
    }
}
