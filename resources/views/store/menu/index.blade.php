@extends('store.layouts.master')

@section('content')
    <div class="content">
        <div class="container">
            @include('dashboard.partials.session')
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active text-center">المنيو الخاصة بالمتجر</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">الاسم</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">الحدث</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($store->menus as $menu)
                        <tr>
                            <td><a href="{{ route('store.menu.show', $store) }}" class="text-primary">{{ $menu->name }}
                                </a>
                            </td>
                            <td>
                                <img class="img-preview"
                                     src="@if($menu->image) {{ asset('assets/uploads/menus/' . $menu->image) }} @else {{ asset('assets/dashboard/img/offers.jpg') }} @endif"
                                     width="50" alt="Store image">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">اختيارات
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                           data-target="#edit-menu-{{$menu->id}}">تعديل</a>
                                        <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                           data-target="#delete-menu-{{$menu->id}}">حذف</a>
                                    </div>
                                </div>
                            </td>
                            @include('store.menu.modal_edit')
                            @include('store.menu.modal_delete')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="#" data-toggle="modal" data-target="#add-menu"
                   class="edit btn btn-success">اضافة منيو <i class="fa fa-plus"></i>
                </a>

                <!-- Modal -->
                @include('store.menu.modal_create')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/image-preview.js') }}"></script>
@endsection
