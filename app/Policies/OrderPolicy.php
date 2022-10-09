<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Order $order)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Order $order)
    {
        return $order->create_user_id === $user->id;
    }

    public function delete(User $user, Order $order)
    {
        if ($user->hasRole('manager')) {
            return $user->checkManagerOrder($order->create_user_id);
        } else if ($user->hasRole('employee')) {
            return $order->create_user_id === $user->id;
        }
    }

    public function restore(User $user, Order $order)
    {
        //
    }

    public function forceDelete(User $user, Order $order)
    {
        //
    }
}
