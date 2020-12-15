@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                <div class="card text-center">
                    <div class="card-header">الرسالة</div>
                    <div class="card-body">
                        <h5 class="card-title text-white bg-primary m-2">نص الرسالة</h5>
                        <p class="card-text">{{ $message->message }}</p>
                        <h5 class="card-title text-white bg-success">رد الرسالة</h5>
                        <p class="card-text">@if($message->answer) {{ $message->answer }} @else  لم يتم الرد بعد @endif</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#replySMS">رد ب SMS</a>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reply-email">رد ب
                            Email</a>
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#reply-notification">رد باشعار </a>
                    </div>
                </div>
                @include('dashboard.messages.modal_reply_email')
                @include('dashboard.messages.modal_reply_notification')
                @include('dashboard.messages.modal_reply_SMS')
            </div>
        </div>
    </div>
@endsection
