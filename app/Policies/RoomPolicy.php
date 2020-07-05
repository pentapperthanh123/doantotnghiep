<?php

namespace App\Policies;

use App\Models\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role == 2) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the device.
     *
     * @param  \App\User  $user
     * @param  \App\Device  $device
     * @return mixed
     */
    public function view(User $user, Room $Room)
    {
        //
    }

    /**
     * Determine whether the user can create Rooms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 2;
    }

    /**
     * Determine whether the user can update the Room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $Room
     * @return mixed
     */
    public function update(User $user, Room $Room)
    {
        return $user->role == 2;
    }

    /**
     * Determine whether the user can delete the Room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $Room
     * @return mixed
     */
    public function delete(User $user, Room $Room)
    {
        return $user->role == 2;
    }

    /**
     * Determine whether the user can restore the Room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $Room
     * @return mixed
     */
    public function restore(User $user, Room $Room)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Room.
     *
     * @param  \App\User  $user
     * @param  \App\Room  $Room
     * @return mixed
     */
    public function forceDelete(User $user, Room $Room)
    {
        //
    }
}
