<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\OAuth2\Client\Token\AccessToken;

class TestAmo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiClient = new \AmoCRM\Client\AmoCRMApiClient(env("AMO_ID"), env("AMO_SECRET"), "https://stom.mawcompany.com/api/amo");
        $apiClient->setAccessToken(new AccessToken(['access_token' => env("AMO_TOKEN"),'expires_in' => '1893459600']));
        $leadsService = $apiClient->leads();
        $leads = $leadsService->get();
        dd($leads);
        return Command::SUCCESS;
    }
}
