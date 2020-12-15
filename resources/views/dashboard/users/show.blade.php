@extends('dashboard.layouts.master')

@section('content')

    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>الملف الشخصي</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                @include('dashboard.partials.errors')
                <div class="add-form">
                    <div class="contact-page">
                        <div class="form-group">
                            <div class="img-block">
                                <div class="image-company">
                                    <img
                                        src="@if($user->image){{ asset('assets/uploads/users/' . $user->image) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif "
                                        alt="Image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>الاسم :</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>رقم الجوال :</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>البريد الاكتروني :</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>الوظيفة الخاصة به :</td>
                                    <td>@if ($user->role) {{$user->role->display_name}} @endif </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(hasPermission('create_user'))
                            <div class="form-group text-center">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#changePassword">تغير
                                    كلمة المرور</a>
                                <a class="btn btn-success" data-toggle="modal" data-target="#changeRole">تغير
                                    الوظيفة الخاصة به</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.users.modal_change_password')
    @include('dashboard.users.modal_change_role')
@endsection
