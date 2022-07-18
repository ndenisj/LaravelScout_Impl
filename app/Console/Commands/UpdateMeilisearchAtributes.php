<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MeiliSearch\Client;
use function PHPUnit\Framework\throwException;

class UpdateMeilisearchAtributes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Meilisearch\'s index and filterable attributes';

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
        $client = new Client(config('scout.meilisearch.host'));

        $this->updateSortableAttributes($client);

        $this->updateFilterableAttributes($client);

        return Command::SUCCESS;
    }

    protected function updateSortableAttributes(Client $client):void
    {
        $client->index('articles')->updateSortableAttributes([
            'title',
            'teaser',
            'created_at',
            'published'
        ]);

        $this->info('Updated sortable attributes...');
    }

    protected function updateFilterableAttributes(Client $client): void
    {
        $client->index('articles')->updateFilterableAttributes([
            'created_at',
            'title',
            'teaser',
            'published'
        ]);

        $this->info('Updated filterable attributes...');
    }
}
