@extends('layouts.app')
@section('title', '新增收货地址')
@section('content')
    <div class="container">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><h3 class="text-center">新增收货地址</h3></div>
                            <div class="card-body">
                                <!-- 输出后端报错开始 -->
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <h4>有错误发生：</h4>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- 输出后端报错结束 -->

                                <!-- inline-template 代表通过内联方式引入组件 -->
                                <user-addresses-create-and-edit inline-template>
                                <form method="POST" action="{{ route('user_addresses.store') }}" role="form">
                                    <!-- 引入 csrf token 字段 -->
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="name" class="col-md-2 col-form-label text-md-right">姓名：</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control " name="name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-2 col-form-label text-md-right">电话：</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control " name="phone" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="zip_code" class="col-md-2 col-form-label text-md-right">邮编：</label>

                                        <div class="col-md-4">
                                            <input id="zip_code" type="text" class="form-control " name="zip_code" required>
                                        </div>
                                    </div>

                                    <!-- 注意这里多了 @change -->
                                    <select-district @change="onDistrictChanged" inline-template>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label text-md-right">省市区：</label>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="provinceId">
                                                    <option value="">选择省</option>
                                                    <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="cityId">
                                                    <option value="">选择市</option>
                                                    <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" v-model="districtId">
                                                    <option value="">选择区</option>
                                                    <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </select-district>
                                    <input type="hidden" name="province" v-model="province">
                                    <input type="hidden" name="city" v-model="city">
                                    <input type="hidden" name="area" v-model="district">

                                    <div class="form-group row">
                                        <label for="address" class="col-md-2 col-form-label text-md-right">详细地址：</label>
                                        <div class="col-md-9">
                                            <input id="address" type="text" class="form-control " name="address" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-5">
                                            <button type="submit" class="btn btn-primary">保存</button>
                                            <a href="{{ route('user_addresses.index') }}" class="btn">返回</a>
                                        </div>
                                    </div>
                                </form>
                                </user-addresses-create-and-edit>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection