<?php

namespace App\Mail;

use App\Models\Recruitment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRecruitment extends Mailable
{
    use Queueable, SerializesModels;
  
    public $data;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recruitment $data)
    {
        $this->data = $data;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $files = [
            public_path('uploads/recruiment/'.$this->data->application_letter),
            public_path('uploads/recruiment/'.$this->data->cv),
            public_path('uploads/recruiment/'.$this->data->attachment1),
        ];

        $this->from('admin@lingga-store.com', 'Recruitment - DST')
            ->subject('Lamaran Pekerjaan - '.$this->data->name)
            ->markdown('emails.recruitment');

        foreach ($files as $file){
            $this->attach($file);
        }

        return $this;
    }
}
