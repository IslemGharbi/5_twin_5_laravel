<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReclamationResponse extends Mailable
{
    public $reclamation;
    public $response;

    public function __construct($reclamation, $response)
    {
        $this->reclamation = $reclamation;
        $this->response = $response;
    }

    public function build()
    {
        return $this->from("esprit.cours1@gmail.com")->view('reclamation-response')
            ->subject('Admin Response to Your Reclamation');
    }
}
