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
                        <form action="@if($user->image){{ route('user.update', $user) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" multiple="" id="gallery-photo-add" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img src="{{ asset('assets/uploads/users/' . $user->image) }}" alt="Image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> إسم المستخدم</label>
                                <input class="form-control @error("name") is-invalid @enderror" type="text" name="name" value="{{ $user->name }}">
                            </div>
                            @error("name")
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>إيميل المستخدم</label>
                                <input class="form-control @error("email") is-invalid @enderror" type="text"
                                       name="email" value="{{ $user->email }}">
                            </div>
                            @error("email")
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> رقم المستخدم</label>
                                <input class="form-control @error("phone") is-invalid @enderror" type="text"
                                       name="phone"  value="{{ $user->phone }}">
                            </div>
                            @error("phone")
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> الرقم الترويجي </label>
                                <input class="form-control @error("commercial_register") is-invalid @enderror" type="text"
                                       name="commercial_register"  value="{{ $user->commercial_register }}">
                            </div>
                            @error("commercial_register")
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> وظيفة المستخدم</label>

                                <select class="form-control" name="role">
                                    <option value="admin">أدمن</option>
                                    <option value="store">صاحب متجر</option>
                                    <option value="user">مستخدم</option>
                                </select>
                            </div>
                            @error("role")
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
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
