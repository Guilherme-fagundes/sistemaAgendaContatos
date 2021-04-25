<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventsEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $dataMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $dataMail)
    {
        $this->dataMail = $dataMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Não responda | Você foi adicionado(a) a um evento");
        $this->to($this->dataMail->email, $this->dataMail->first_name);
        return $this->view('acount/events/mail/eventMailTemplate', [
            'data' => $this->dataMail
        ]);
    }
}
