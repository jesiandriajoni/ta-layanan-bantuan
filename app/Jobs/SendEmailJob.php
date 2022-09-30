<?php

namespace App\Jobs;

use App\Mail\Emailteknisi;
use App\Models\Pengaduan;
use App\Models\Teknisi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $pengaduan;
    private $teknisi;
    public function __construct($pengaduan,$teknisi)
    {
        //
        // dd($teknisi);
        $this->pengaduan=$pengaduan;
        $this->teknisi=$teknisi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        //
        // $teknisi=

        Mail::to($this->teknisi->email)->send(new Emailteknisi($this->pengaduan,$this->teknisi));



    }
}
