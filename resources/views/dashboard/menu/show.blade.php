@extends('dashboard.layouts.master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>معلومات المنيو</h3>
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
                                        src="@if($menu->image) {{ asset('assets/uploads/menus/' . $menu->image) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th> أسم المنيو :</th>
                                <td>{{ $menu->name }}</td>
                            </tr>
                            </thead>
                        </table>

                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active text-center">المنتجات
                                الخاصة بمنيو  "{{ $menu->name }} "</a>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الوصف</th>
                                    <th scope="col">الحدث</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu->products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td><a href="{{ route('product.show', $product) }}" class="text-primary">{{ $product->name }}</a></td>
                                        <td>
                                            @if (strlen($product->description) > 95 ) {!!   substr($product->description, 0, 95) . '...'   !!}
                                            @else {!! $product->description !!}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    اختيارات
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('product.show', $product) }}" class="dropdown-item text-primary">عرض</a>
                                                    <a href="javascript::void();"
                                                       class="dropdown-item text-success" data-toggle="modal"
                                                       data-target="#edit-product-{{$product->id}}">تعديل</a>
                                                    <a href="javascript::void();"  class="dropdown-item text-danger" data-toggle="modal"
                                                       data-target="#delete-product-{{$product->id}}">حذف</a>
                                                </div>
                                            </div>
                                        </td>
                                        @include('dashboard.products.modal_edit')
                                        @include('dashboard.products.modal-delete')
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="#" data-toggle="modal" data-target="#add-product"
                               class="edit btn btn-success">اضافة منتج <i class="fa fa-plus"></i>
                            </a>
                            <!-- Modal -->
                            @include('dashboard.products.modal_create')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection
