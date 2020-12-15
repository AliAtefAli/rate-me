@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="add-offer">
            <div class="container">
                <div class="card text-center">
                    <div class="card-header">الرسالة</div>
                    <div class="card-body">
                        <h5 class="card-title text-white bg-primary p-2">نص الرسالة</h5>
                        <p class="card-text">{{ $complaint->message }}</p>
                        <h5 class="card-title text-white bg-success p-2">رد الرسالة</h5>
                        <p class="card-text">@if($complaint->answer) {{ $complaint->answer }} @else  لم يتم الرد بعد @endif</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#replySMS">رد ب SMS</a>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reply-email">رد ب
                            Email</a>
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#reply-notification">رد باشعار </a>
                    </div>
                </div>

                @include('dashboard.complaints.modal_reply_email')
                @include('dashboard.complaints.modal_reply_notification')
                @include('dashboard.complaints.modal_reply_SMS')
            </div>
        </div>
    </div>
@endsection
