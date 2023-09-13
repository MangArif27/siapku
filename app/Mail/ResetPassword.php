<?php

namespace App\Mail;

use App\Http\Controllers\AdminController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($link, $nama)
  {
    $this->nama = $nama;
    $this->link = $link;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('noreply_admin@siratucilokrutandepok.com')
      ->view('page/isireset')
      ->with([
        'nama' => $this->nama,
        'link' => $this->link,
      ]);
  }
}
