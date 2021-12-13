<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\Request;
use App\Models\ProductSku;
use App\Services\CartService;

class CartController extends Controller
{

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index(Request $request)
    {
        $cartItems = $this->cartService->get();
        $addresses = $request->user()->address()->orderBy('last_used_at', 'desc')->get();

        return view('cart.index', ['cartItems' => $cartItems, 'addresses' => $addresses]);
    }

    /**
     * 加入购物车
     * @param AddCartRequest $request
     * @return array
     */
    public function add(AddCartRequest $request)
    {
        $this->cartService->add($request->input('sku_id'), $request->input('amount'));
        return [];
    }

    /**
     * 移出购物车
     * @param ProductSku $sku
     * @param Request $request
     * @return array
     */
    public function remove(ProductSku $sku, Request $request)
    {
        $this->cartService->remove($sku->id);
        return [];
    }
}
