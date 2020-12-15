@extends('dashboard.layouts.master')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>إضافة مستخدم</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('site.update', $site) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" id="img-input" name="logo">
                                    </div>
                                    <div class="image-company">
                                        <img
                                            src="@if ($site->logo) {{ asset('assets/uploads/site/' . $site->logo) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif "
                                            alt="Image" class="img-preview">
                                    </div>
                                </div>
                            </div>

                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label> إسم الموقع {{ $language }}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror" type="text"
                                           name="{{$key}}[name]"
                                           value="{{ $site->translate($key)->name }}">
                                </div>
                                @error("$key.name")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="form-group">
                                <label>إيميل الموقع </label>
                                <input class="form-control @error("email") is-invalid @enderror" type="text"
                                       name="email" value="{{ $site->email }}">
                            </div>
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> لينك الموقع </label>
                                <input class="form-control @error("site_link") is-invalid @enderror" type="text"
                                       name="site_link" value="{{ $site->site_link }}">
                            </div>
                            @error("site_link")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> لينك الاندرويد </label>
                                <input class="form-control @error("android_link") is-invalid @enderror" type="text"
                                       name="android_link" value="{{ $site->android_link }}">
                            </div>
                            @error("android_link")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>لينك الايفون </label>
                                <input class="form-control @error("ios_link") is-invalid @enderror" type="text"
                                       name="ios_link" value="{{ $site->ios_link }}">
                            </div>
                            @error("ios_link")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label>{{ $language }} سياسة الموقع </label>
                                    <input id="{{$key}}.policies" type="hidden" name="{{$key}}[policies]"
                                           value="{{ $site->translate($key)->policies }}">
                                    <trix-editor input="{{$key}}.policies"></trix-editor>
                                </div>
                                @error("$key.policies")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label> عن الموقع{{ $language }}</label>
                                    <input id="{{$key}}.about" type="hidden" name="{{$key}}[about]"
                                           value="{{ $site->translate($key)->about }}">
                                    <trix-editor input="{{$key}}.about"></trix-editor>
                                </div>
                                @error("$key.about")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label> وصف الموقع {{ $language }}</label>
                                    <input id="{{$key}}.description" type="hidden" name="{{$key}}[description]"
                                           value="{{ $site->translate($key)->description }}">
                                    <trix-editor input="{{$key}}.description"></trix-editor>
                                </div>
                                @error("$key.description")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="submit-btn">
                                <button type="submit" class="brown">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
    <script src="{{ asset('assets/dashboard/js/image-preview.js') }}"></script>
@endsection
