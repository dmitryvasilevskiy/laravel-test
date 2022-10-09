<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    const PAGINATE = 10;

    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('manager')) {
            return Order::query()
                ->WhereIn('create_user_id', $user->getUserIdWithEmployeeIds())
                ->paginate(self::PAGINATE);
        } else if ($user->hasRole('employee')) {
            return Order::query()
                ->where('create_user_id', Auth::id())
                ->paginate(self::PAGINATE);
        }
        return [];
    }

    public function create()
    {
        //
    }

    public function store(OrderStoreRequest $r)
    {
        return Order::query()->create([
            'name' => $r->get('name', 'name'),
            'img' => $r->get('img', 'w3.org/People/mimasa/test/imgformat/img/w3c_home.jpg'),
            'category_id' => $r->get('category_id', 1),
            'create_user_id' => Auth::id()
        ]);
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $r, Order $order)
    {
        $this->authorize('update', Auth::user());
        return $order->update($r->only(['name', 'img', 'category_id']));
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', Auth::user());
        return $order->delete();
    }
}
