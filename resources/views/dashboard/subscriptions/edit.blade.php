@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>تعديل القسم</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('subscription.update', $subscription) }}" method="post">
                            @csrf
                            @method('PUT')
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم القسم {{$language}}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]" value="{{ $subscription->translate($key)->name }}">
                                </div>
                                @error("$key.name")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> وصف الاشتراك {{$language}}</label>
                                    <input class="form-control @error("$key.description") is-invalid @enderror"
                                           type="text" name="{{$key}}[description]"  value="{{ $subscription->translate($key)->description }}">
                                </div>
                                @error("$key.description")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة الاشتراك </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
