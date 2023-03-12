<?php

namespace App\Mail;

use App\Console\Kernel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tanggal, $pengunjung, $tamu, $s_tamu, $user)
    {
      $this->tanggal=$tanggal;
      $this->pengunjung=$pengunjung;
      $this->tamu=$tamu;
      $this->s_tamu=$s_tamu;
      $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('noreply@silajulapaskarawang.com')
          ->view('page/notifikasi')
          ->with([
                'tanggal' => $this->tanggal,
                'pengunjung'=> $this->pengunjung,
                'tamu'=> $this->tamu,
                's_tamu'=> $this->s_tamu,
                'user'=> $this->user,
            ]);
  }
}