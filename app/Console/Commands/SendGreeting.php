<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class SendGreeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-greeting';

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
       $hour = 14;

        if($hour <= 12){
            $message = "Good Morning";
        }
        elseif($hour <= 18){
            $message = "Good Afternoon";
        }
        else{
            $message = "Good Evening";
        }
        $this->info($message);
        $this->info("Current Hour: " . $hour);

    }
    
}