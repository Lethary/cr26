<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClassementFinalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function build()
    {
        return $this->subject("Classement final du Concours Robots")
                    ->markdown('emails.classement.final')
                    ->attach($this->filepath, [
                        'as' => 'classement_final.csv',
                        'mime' => 'text/csv',
                    ]);
    }
}
