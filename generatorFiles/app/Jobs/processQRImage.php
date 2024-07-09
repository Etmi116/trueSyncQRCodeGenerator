<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class processQRImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    /**
     * Create a new job instance.
     */
    public function __construct($pathTo)
    {
        $this->path = $pathTo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        unlink($this->path);
    }
}
