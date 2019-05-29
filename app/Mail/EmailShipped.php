<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $ms;
    public $graph;

    public function __construct($subject, $ms, $graph)
    {
        $this->subject = $subject;
        $this->ms = $ms;
        $this->graph = $graph;
    }

    public function build()
    {
        switch ($this->ms['type'])
        {
            case 'problem':
                return $this->subject($this->subject)
                            ->view('emails.problem');
                break;
            
            case 'resolved':
                return $this->subject($this->subject)
                            ->view('emails.resolved');

            case 'acknowledged':
                return $this->subject($this->subject)
                            ->view('emails.acknowledged');

            default:
                //
                break;
        }
    }
}
