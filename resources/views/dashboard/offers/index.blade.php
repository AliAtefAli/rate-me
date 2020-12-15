@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="container">
            <div class="table-option">
                <div class="detele-option">
                    <input id="select-all" class="delete-all" type="checkbox" name="">
                    <label for="select-all">
                        تحديد الكل
                    </label>
                    <button class="btn btn-danger" data-toggle="modal"
                            data-target="#delete-products">حذف
                    </button>
                </div>
                <div class="add-service">
                    <a href="#" data-toggle="modal" data-target="#create-offer">
                        <i class="fas fa-plus-square"></i>
                    </a>
                </div>
            </div>
            @include('dashboard.partials.session')
            <div class="table-responsive">
                <table id="example" class="table text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>رقم</th>
                        <th>العنوان</th>
                        <th>الصورة</th>
                        <th>الحدث</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $index => $offer)
                        <tr>
                            <td><input data-id="{{ $offer->id }}" class="rocord-check" type="checkbox"></td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $offer->url }}</td>
                            <td><img src="{{ asset('assets/uploads/offers/' .  $offer->image ) }}" width="100" alt="">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        اختيارات
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                           data-target="#edit-offer-{{$offer->id}}">تعديل</a>
                                        <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                           data-target="#delete-offer-{{$offer->id}}">حذف</a>
                                    </div>
                                </div>
                            </td>

                            @include('dashboard.offers.modal-delete')
                            @include('dashboard.offers.modal_edit')
                        </tr>
                    @endforeach
                    @include('dashboard.offers.modal_create')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
@endsection
