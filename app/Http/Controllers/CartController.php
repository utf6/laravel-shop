<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\Request;
use App\Models\CartItem;
use App\Models\ProductSku;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/10/20   16:12
     */
    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();
        $addresses = $request->user()->address()->orderBy('last_used_at', 'desc')->get();

        return view('cart.index', ['cartItems' => $cartItems, 'addresses' => $addresses]);
    }

    /**
     * 加入购物车
     * @param AddCartRequest $request
     * @return array
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/12/6   11:06
     */
    public function add(AddCartRequest $request)
    {
        $user   = $request->user();
        $skuId  = $request->input('sku_id');
        $amount = $request->input('amount');

        // 从数据库中查询该商品是否已经在购物车中
        if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
            // 如果存在则直接叠加商品数量
            $cart->update([
                'amount' => $cart->amount + $amount,
            ]);
        } else {
            // 否则创建一个新的购物车记录
            $cart = new CartItem(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];
    }

    /**
     * 移出购物车
     * @param ProductSku $sku
     * @param Request $request
     * @return array
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/12/6   11:06
     */
    public function remove(ProductSku $sku, Request $request)
    {
        $request->user()->cartItems()->where('product_sku_id', $sku->id)->delete();

        return [];
    }
}
