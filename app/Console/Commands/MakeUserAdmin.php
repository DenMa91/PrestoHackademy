<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente amministratore';

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
     * @return int
     */
    public function handle()
    {
        $email = $this->ask("inserisci l'email dell'utente che vuoi rendere amministratore" );
        $user = User::where('email', $email)->first();

        if(!$user){
            $this->error('utente non trovato');
            return;
        }

        $user->is_admin = true;
        $user->save();
        $this->info("l'utente {$user->name} è ora un amministratore");
        
    }
}
