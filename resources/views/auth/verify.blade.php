@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('邮箱验证') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('在继续之前，请检查您的电子邮件以获得验证链接。如果您没有收到电子邮件，可以重新发送。') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary justify-content-center btn-sm p-2-1 m-2 ">{{ __('重新发送') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
