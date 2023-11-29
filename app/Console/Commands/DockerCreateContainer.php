<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DockerCreateContainer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:docker-create-container {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $this->info('Docker container created for user with email: $email');
    }
}
