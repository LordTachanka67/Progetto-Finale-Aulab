<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-user-revisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rimuove un utente come revisore';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if(!$user){
            $this->error('Utente non trovato');
            return;
        }

        $user->is_revisor = false;
        $user->save();
        $this->info("L'utente ' . $user->name . ' non è più revisore");
    }
}
