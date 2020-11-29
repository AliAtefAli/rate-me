@extends('dashboard.layouts.master')

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
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('site.update', $site) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" multiple="" id="gallery-photo-add" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img
                                            src="@if ($site->logo) {{ asset('assets/uploads/sites/' . $site->logo) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif "
                                            alt="Image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> إسم الموقع </label>
                                <input class="form-control @error("name") is-invalid @enderror" type="text" name="name"
                                       value="{{ $site->name }}">
                            </div>
                            @error("name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

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

                            <div class="form-group">
                                <label> سياسة الموقع </label>
                                <textarea class="form-control @error("policies") is-invalid @enderror"
                                          name="policies">{{ $site->policies }}</textarea>
                            </div>
                            @error("policies")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>عن الموقع </label>
                                <textarea class="form-control @error("about") is-invalid @enderror"
                                          name="policies">{{ $site->about }}</textarea>
                            </div>
                            @error("about")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> وصف الموقع </label>
                                <textarea class="form-control @error("description") is-invalid @enderror"
                                          name="policies">{{ $site->description }}</textarea>
                            </div>
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>هاتف الايفون </label>
                                <input class="form-control @error("phone") is-invalid @enderror" type="text"
                                       name="phone" value="{{ $site->phone }}">
                            </div>
                            @error("phone")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


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
