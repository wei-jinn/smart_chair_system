<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunWhiteboardServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whiteboard:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start whiteboard server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        shell_exec('node server.js');
    }
}
