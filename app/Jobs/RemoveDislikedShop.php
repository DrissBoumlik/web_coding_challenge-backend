<?php

namespace App\Jobs;

use App\ShopUser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RemoveDislikedShop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $shop_user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shop_user)
    {
        $this->shop_user = $shop_user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop_user_deleted = $shop_user->delete();
        return $shop_user_deleted;
    }
}
