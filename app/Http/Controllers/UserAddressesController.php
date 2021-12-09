<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    //

    /**
     * 用户地址
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('user_addresses.index', [
            'addresses' => $request->user()->address,
        ]);
    }

    /**
     * 添加收获地址视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function create()
    {
        return view('user_addresses.create');
    }

    /**
     * 保存收货地址
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->user()->address()->create($request->only([
            'province',
            'city',
            'area',
            'address',
            'zip_code',
            'name',
            'phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    /**
     * 编辑地址界面
     * @param UserAddress $userAddress
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/10/19   13:53
     */
    public function edit(UserAddress $userAddress)
    {
        $this->authorize('own', $userAddress);

        return view('user_addresses.edit', ['address' => $userAddress]);
    }

    /**
     * 修改地址
     * @param UserAddress $userAddress
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/10/19   13:53
     */
    public function update(UserAddress $userAddress, UserAddressRequest $request)
    {
        $this->authorize('own', $userAddress);
        $userAddress->update($request->only([
            'province', 'city', 'area', 'address', 'zip', 'name', 'phone'
        ]));

        return redirect()->route('user_addresses.index');
    }

    /**
     * 删除地址
     * @param UserAddress $userAddress
     * @return array
     * @throws \Exception
     * @author: wang.weitao1 <wang.weitao1@byd.com>
     * @Time: 2021/10/19   13:50
     */
    public function destroy(UserAddress $userAddress)
    {
        $this->authorize('own', $userAddress);

        if ($userAddress->delete()) {
            return ['code' => 200, 'msg' => 'ok'];
        }

        return ['code' => 0, 'msg' => 'error'];
    }
}
