<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranSertifikasi extends Mailable
{
    use Queueable, SerializesModels;

    // public $company, $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        // $company, $product
        )
    {
        // $this->company = $company;
        // $this->product = $product;
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
                    ->subject('Pendaftaran Sertifikasi Green Label Indonesia')
                    ->view('email-client')
                    // ->with(
                    //     [
                    //         'nama_perusahaan' => $this->company,
                    //         'nama_produk' => $this->product,
                    //     ]
                    // )
                    ;
    }
}
