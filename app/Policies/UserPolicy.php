<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Config;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role == Config::get('code.user.role.Admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the odel= user.
     *
     * @param  \App\User  $user
     * @param  \App\odel=User  $odel=User
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create odel= users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == Config::get('user.role.Admin');
    }

    /**
     * Determine whether the user can update the odel= user.
     *
     * @param  \App\User  $user
     * @param  \App\odel=User  $odel=User
     * @return mixed
     */
    public function update(User $user) 
    {
        return $user->role == Config::get('user.role.Technicians');
    }

    /**
     * Determine whether the user can delete the odel= user.
     *
     * @param  \App\User  $user
     * @param  \App\odel=User  $odel=User
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == Config::get('user.role.Admin');
    }

    /**
     * Determine whether the user can restore the odel= user.
     *
     * @param  \App\User  $user
     * @param  \App\odel=User  $odel=User
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the odel= user.
     *
     * @param  \App\User  $user
     * @param  \App\odel=User  $odel=User
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
