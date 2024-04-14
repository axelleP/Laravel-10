<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Log\Logger;

class GetJoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-joke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a joke';

    public function info($string, $verbosity = null)
    {
        parent::info(now() . ' - ' . $string);
    }

    /**
     * Execute the console command.
     */
    public function handle(Logger $logger)
    {
        try {
            $startTime = microtime(true);
            $this->info('Début du traitement');
            // throw new Exception('test exception');
            
            $response = Http::get('http://official-joke-api.appspot.com/random_joke');
            $data = $response->json();
            $joke = $data['setup'] . ' : ' . $data['punchline'];
            Cache::put('joke', $joke, now()->addDay());

            $endTime = microtime(true);
            $this->info('Fin du traitement');

            $executionTime = date('H:i:s', $endTime - $startTime);
            $this->info('Temps d\'exécution : ' . $executionTime);
        } catch (\Exception $e) {
            $this->error('Command GetJoke : ' . $e->getMessage());
            $logger->channel('command')->error('Command GetJoke : ' . $e->getMessage());
        }    
    }
}
