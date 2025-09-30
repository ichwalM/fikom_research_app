<?php

namespace App\Policies;

use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JurnalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Jurnal $jurnal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Jurnal $jurnal): bool
    {
        // Izinkan jika user adalah Admin ATAU jika user_id di jurnal sama dengan id user yang login
        return $user->role->name === 'Admin Fakultas' || $user->id === $jurnal->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jurnal $jurnal): bool
    {
        // Logikanya sama dengan update
        return $user->role->name === 'Admin Fakultas' || $user->id === $jurnal->user_id;
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jurnal $jurnal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jurnal $jurnal): bool
    {
        return false;
    }
}
