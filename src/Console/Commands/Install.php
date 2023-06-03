<?php

namespace Webkul\RestApi\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto-rest-api:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish L5SwaggerServiceProvider provider, view and config files.';

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
     * Install and configure bagisto rest api.
     */
    public function handle()
    {   
        // running `php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"`
        $this->warn('Step: Publishing L5Swagger Provider File...');
        $result = shell_exec('php artisan vendor:publish --tag=bagisto-rest-api-swagger');
        $this->info($result);

        $result = shell_exec('php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"');
        $this->info($result);

        $this->warn('Step: Generate l5-swagger docs (Admin & Shop)...');
        $result = shell_exec('php artisan l5-swagger:generate --all');
        $this->info($result);

        // final information
        $this->comment('-----------------------------');
        $this->comment('Success: Bagisto REST API has been configured successfully.');
    }
}
