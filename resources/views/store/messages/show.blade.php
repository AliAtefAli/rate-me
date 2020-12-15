@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="add-offer">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1 class="pb-3">نص الرسالة</h1>
                        <p class="lead">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
