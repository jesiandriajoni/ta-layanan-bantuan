<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Emailteknisi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $pengaduan;
    private $teknisi;
    public function __construct($pengaduan,$teknisi)
    {
        //
        $this->teknisi=$teknisi;
        $this->pengaduan=$pengaduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jesiiandriajoni@gmail.com')
                    ->view('/pages/emaildariteknisi')
                    ->with([
                        'pengaduan'=>$this->pengaduan->pengaduan,
                        'keterangan'=>$this->pengaduan->keterangan,
                        'nama_teknisi'=>$this->teknisi->nama_teknisi,
                    ]);
                    //nama pengirim email
                    //memanggil tampilan email.blade.php
                    /*ngirim data naame ke view email.blade.php $this->user->name untuk
                    mendapatkan data nama yang diinput user*/
                    /*bas64 ini berfungsi untuk mengacak kode email agar tidak mudah terbaca
                    sama orang nanti saat proses verifikasi yang tadinya kode emailnya diacak diubah
                    menjadi seperti biasa*/
    }

}
