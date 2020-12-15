@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>معلومات المتجر</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.errors')
                @include('dashboard.partials.session')
                <div class="add-form">
                    <div class="contact-page">
                        <div class="form-group">
                            <div class="img-block">
                                <div class="image-company">
                                    <img
                                        src="@if($store->image) {{ asset('assets/uploads/stores/' . $store->image ) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th> أسم المتجر :</th>
                                <td>{{ $store->name }}</td>
                            </tr>
                            <tr>
                                <th> وصف المتجر :</th>
                                <td>{!! $store->description !!}</td>
                            </tr>
                            <tr>
                                <th> موقع المتجر :</th>
                                <td>{{ $store->store_site }}</td>
                            </tr>
                            <tr>
                                <th> رقم المتجر :</th>
                                <td>{{ $store->phone }}</td>
                            </tr>
                            <tr>
                                <th> نوع التوصيل :</th>
                                <td>{{ $store->delivery_type }}</td>
                            </tr>
                            <tr>
                                <th> سعر التوصبل :</th>
                                <td>{{ $store->delivery_price }}</td>
                            </tr>
                            </thead>
                        </table>

                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active text-center">
                                المنيو الخاصة بالمتجر</a>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الحدث</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($store->menus as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td><a href="{{ route('menu.show', $store) }}" class="text-primary">{{ $menu->name }}</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    اختيارات
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('menu.show', $store) }}" class="dropdown-item text-primary">{{ $menu->name }}</a>
                                                    <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                                       data-target="#edit-menu-{{$menu->id}}">تعديل</a>
                                                    <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                                       data-target="#delete-menu-{{$menu->id}}">حذف</a>
                                                </div>
                                            </div>
                                        </td>
                                        @include('dashboard.menu.modal_edit')
                                        @include('dashboard.menu.modal_delete')
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="#" data-toggle="modal" data-target="#add-menu"
                               class="edit btn btn-success">اضافة منيو <i class="fa fa-plus"></i>
                            </a>
                            @include('dashboard.menu.modal_create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
