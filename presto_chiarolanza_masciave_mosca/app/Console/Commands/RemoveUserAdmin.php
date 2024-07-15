<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-user-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rimuove un utente admin';

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

        $user->is_admin = false;
        $user->save();
        $this->info("L'utente ' . $user->name . ' non è più admin");
    }
}
