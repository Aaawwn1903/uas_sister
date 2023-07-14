<?php
namespace App\Policies;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BukuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any buku.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->tipe === 'pustakawan';
    }

    /**
     * Determine whether the user can view the buku.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return mixed
     */
    public function view(User $user, Buku $buku)
    {
        // Implement your logic here
    }

    /**
     * Determine whether the user can create buku.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // Implement your logic here
    }

    /**
     * Determine whether the user can update the buku.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return mixed
     */
    public function update(User $user, Buku $buku)
    {
        return $user->tipe === 'pustakawan';
    }

    /**
     * Determine whether the user can delete the buku.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return mixed
     */
    public function delete(User $user, Buku $buku)
    {
        // Implement your logic here
    }
}
