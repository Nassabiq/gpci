<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranSertifikasi extends Mailable
{
    use Queueable, SerializesModels;

    // public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->nama_perusahaan = $company->nama_perusahaan;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notif@gpci.or.id')
                    ->view('email')
                    ->with(
                        [
                            'nama_perusahaan' => '$this->nama_perusahaan',
                        ]
                    );
    }
}
