<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PegawaiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function access(User $user)
    {
        return ($user->sebagai == "pegawai" ? Response::allow() : Response::deny("Kamu bukan pegawai"));
    }
}
