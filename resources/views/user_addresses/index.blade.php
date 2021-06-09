@extends('layouts.app')

@section('title', '收货地址列表')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-lg-offset-1">
            <div class="card card-default">
                <div class="card-header">收货地址列表
                    <a href="{{ route('user_addresses.create') }}" class="block pull-right">新增收货地址</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>收货人</th>
                            <th>地址</th>
                            <th>邮编</th>
                            <th>电话</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->name }}</td>
                                <td>{{ $address->full_address }}</td>
                                <td>{{ $address->zip_code }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">修改</button>
                                    <button class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection