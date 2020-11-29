@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>إضافة باقة </h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('subscription.store') }}" method="post">
                            @csrf
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم الباقة {{$language}}</label>
                                    <input autofocus class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]">
                                </div>
                                @error("$key.name")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> وصف الباقة {{$language}}</label>
                                    <input class="form-control @error("$key.description") is-invalid @enderror"
                                           type="text" name="{{$key}}[description]">
                                </div>
                                @error("$key.description")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة الباقة </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
