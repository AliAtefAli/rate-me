@extends('dashboard.layouts.master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.errors')
                @include('dashboard.partials.session')

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active text-center">
                        المتاجر الخاصة بقسم  "{{ $category->name }} "</a>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المتجر</th>
                            <th scope="col">وصف المتجر</th>
                            <th scope="col">الحدث</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->stores as $index=> $store)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    <a href="{{ route('store.show', $store) }}" class="text-primary">{{ $store->name }}</a>
                                </td>
                                <td>{!!  $store->description !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            اختيارات
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                               data-target="#edit-store-{{$store->id}}">تعديل</a>
                                            <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                               data-target="#delete-store-{{$store->id}}">حذف</a>
                                        </div>
                                    </div>
                                </td>
                                @include('dashboard.stores.modal_edit')
                                @include('dashboard.stores.modal_delete')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="#" data-toggle="modal" data-target="#add-store"
                       class="btn btn-success">اضافة متجر <i class="fa fa-plus"></i>
                    </a>
                    @include('dashboard.stores.modal_create')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection
