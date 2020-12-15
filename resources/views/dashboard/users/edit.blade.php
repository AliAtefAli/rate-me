@extends('dashboard.layouts.master')

@section('content')

    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>تعديل مستخدم</h3>
                </div>
            </div>
        </div>
        @include('dashboard.partials.session')
        @include('dashboard.partials.errors')
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('user.update', $user) }} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" class="img-input" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img
                                            src="@if($user->image){{ asset('assets/uploads/users/' . $user->image) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif "
                                            alt="Image"
                                            class="img-preview">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> إسم المستخدم</label>
                                <input class="form-control @error("name") is-invalid @enderror" type="text" name="name"
                                       value="{{ $user->name }}">
                            </div>
                            @error("name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>إيميل المستخدم</label>
                                <input class="form-control @error("email") is-invalid @enderror" type="text"
                                       name="email" value="{{ $user->email }}">
                            </div>
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> رقم المستخدم</label>
                                <input class="form-control @error("phone") is-invalid @enderror" type="text"
                                       name="phone" value="{{ $user->phone }}">
                            </div>
                            @error("phone")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> الرقم الترويجي </label>
                                <input class="form-control @error("commercial_register") is-invalid @enderror"
                                       type="text"
                                       name="commercial_register" value="{{ $user->commercial_register }}">
                            </div>
                            @error("commercial_register")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group text-center">
                                <a class="btn btn-primary" data-toggle="modal"
                                   data-target="#changePassword">تغير كلمة المرور</a>
                                <a class="btn btn-success" data-toggle="modal" data-target="#changeRole">تغير الوظيفة الخاصة به</a>
                            </div>

                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة القسم</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.users.modal_change_password')
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/image-preview.js') }}"></script>
@endsection
