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
                @include('dashboard.partials.errors')
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" class="img-input" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img src="{{ asset('assets/dashboard/img/user-img.png') }}" alt="Image"
                                            class="img-preview">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> إسم المستخدم</label>
                                <input class="form-control @error("name") is-invalid @enderror" autofocus type="text" name="name"
                                       value="{{ old('name') }}">
                            </div>
                            @error("name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>إيميل المستخدم</label>
                                <input class="form-control @error("email") is-invalid @enderror" type="text"
                                       name="email" value="{{ old('email') }}">
                            </div>
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> رقم المستخدم</label>
                                <input class="form-control @error("phone") is-invalid @enderror" type="text"
                                       name="phone" value="{{ old('phone') }}">
                            </div>
                            @error("phone")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> الرقم الترويجي </label>
                                <input class="form-control @error("commercial_register") is-invalid @enderror"
                                       type="text"
                                       name="commercial_register" value="{{ old('commercial_register') }}">
                            </div>
                            @error("commercial_register")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>الرقم السري </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>تاكيد الرقم
                                    السري</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                                <div class="form-group">
                                    <label> وظيفة المستخدم</label>
                                    <select class="form-control" name="type">
                                        <option value="admin">أدمن</option>
                                        <option value="store">صاحب متجر</option>
                                        <option value="user">مستخدم</option>
                                    </select>
                                </div>
                                @error("role")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة القسم</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
