<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\Request;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;

class OrdersController extends Controller
{

    /**
     * 订单列表
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * 创建订单
     * @param OrderRequest $request
     * @param OrderService $orderService
     * @return mixed
     */
    public function store(OrderRequest $request, OrderService $orderService)
    {
        return $orderService->store(
            $request->user(),
            UserAddress::find($request->input('address_id')),
            $request->input('remark'),
            $request->input('items')
        );
    }

    /**
     * 订单详情
     * @param Order $order
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Order $order)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.product', 'items.productSku'])]);
    }
}
