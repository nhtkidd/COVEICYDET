<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $nameProposal;
    public function __construct($nameProposal)
    {
        $this->nameProposal = $nameProposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $name = $this->nameProposal;
    
        return $this->view('mails.proposalConfirmation',['name'=>$name]);
    }
}
