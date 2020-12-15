@extends('dashboard.layouts.master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')

    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>معلومات المنتج</h3>
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
                                        src="@if($product->image) {{ asset('assets/uploads/stores/' . $product->image ) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ $product->name }}</th>
                                <th>{{ $product->price }}ر.س</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $product->description }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active text-center">
                                الاضافات الخاصة بالمنتج</a>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الوصف</th>
                                    <th scope="col">الصورة</th>
                                    <th scope="col">الحدث</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->additions as $addition)
                                    <tr>
                                        <th scope="row">{{ $addition->id }}</th>
                                        <td>
                                            <a href="{{ route('addition.show', $product) }}" class="text-primary">{{ $addition->name }}
                                            </a>
                                        </td>
                                        <td>
                                            @if (strlen($addition->description) > 95 ) {!!   substr($addition->description, 0, 95) . '...'   !!}
                                            @else {!! $addition->description !!}
                                            @endif
                                        </td>
                                        <td>
                                            <img class="img-preview"
                                                 src="@if($addition->image) {{ asset('assets/uploads/additions/' . $addition->image) }} @else {{ asset('assets/dashboard/img/offers.jpg') }} @endif"
                                                 width="50" alt="Store image">
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    اختيارات
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('addition.show', $addition) }}" class="dropdown-item text-primary">عرض</a>
                                                    <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                                       data-target="#edit-addition-{{$addition->id}}">تعديل</a>
                                                    <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                                       data-target="#delete-addition-{{$addition->id}}">حذف</a>
                                                </div>
                                            </div>

                                        </td>
                                        @include('dashboard.additions.modal_edit')
                                        @include('dashboard.additions.modal_delete')
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="#" data-toggle="modal" data-target="#add-addition"
                               class="edit btn btn-success">اضافة اضافة <i class="fa fa-plus"></i>
                            </a>

                            <!-- Modal -->
                            @include('dashboard.additions.modal_create')
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
