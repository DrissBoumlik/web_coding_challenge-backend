<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ShopUser;

class RemoveDislikedShopCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop_user:delete {shop_user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a ShopUser record after 2 hours';

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
        Log::info('About to delete');
        $shop_user_deleted = $shop_user->delete();
        return $shop_user_deleted;
    }
}
