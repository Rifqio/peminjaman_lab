<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CreatePeminjaman;
use App\Notifications\ApprovedPeminjaman;
use Illuminate\Support\Facades\Notification;

class PeminjamanObserver
{
    /**
     * Handle the Peminjaman "created" event.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return void
     */
    public function created(Peminjaman $peminjaman)
    {
       $user = User::whereRoleIs('admin')->get();
       Notification::send($user, new CreatePeminjaman($peminjaman));
    }

    /**
     * Handle the Peminjaman "updated" event.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return void
     */
    public function updated(Peminjaman $peminjaman)
    {
        $user = User::whereRoleIs('student')->get();
        $peminjaman = Peminjaman::where('status_id', 4)->where('user_id', Auth::id())->get();
        Notification::send($user, new ApprovedPeminjaman($peminjaman));
    }

    /**
     * Handle the Peminjaman "deleted" event.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return void
     */
    public function deleted(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Handle the Peminjaman "restored" event.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return void
     */
    public function restored(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Handle the Peminjaman "force deleted" event.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return void
     */
    public function forceDeleted(Peminjaman $peminjaman)
    {
        //
    }
}
