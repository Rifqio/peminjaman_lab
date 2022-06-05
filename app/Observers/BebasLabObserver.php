<?php

namespace App\Observers;

use App\Models\User;
use App\Models\BebasLab;
use App\Notifications\CreateBebasLab;
use Illuminate\Support\Facades\Notification;

class BebasLabObserver
{
    /**
     * Handle the BebasLab "created" event.
     *
     * @param  \App\Models\BebasLab  $bebasLab
     * @return void
     */
    public function created(BebasLab $bebasLab)
    {
        $user = User::whereRoleIs('admin')->get();
        Notification::send($user, new CreateBebasLab($bebasLab));
    }

    /**
     * Handle the BebasLab "updated" event.
     *
     * @param  \App\Models\BebasLab  $bebasLab
     * @return void
     */
    public function updated(BebasLab $bebasLab)
    {
        //
    }

    /**
     * Handle the BebasLab "deleted" event.
     *
     * @param  \App\Models\BebasLab  $bebasLab
     * @return void
     */
    public function deleted(BebasLab $bebasLab)
    {
        //
    }

    /**
     * Handle the BebasLab "restored" event.
     *
     * @param  \App\Models\BebasLab  $bebasLab
     * @return void
     */
    public function restored(BebasLab $bebasLab)
    {
        //
    }

    /**
     * Handle the BebasLab "force deleted" event.
     *
     * @param  \App\Models\BebasLab  $bebasLab
     * @return void
     */
    public function forceDeleted(BebasLab $bebasLab)
    {
        //
    }
}
