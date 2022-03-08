<?php

namespace App\Listeners;

use App\Event\LoginHistory;
use App\Models\LogedUser;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class StoreLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $userinfo = $event->user;
        $logininfo = LogedUser::create([
            'user_id' => $userinfo->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        return $logininfo;
    }
}
