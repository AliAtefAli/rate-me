@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="d-table">
            <div class="container">
                <div class="table-option">
                    <div class="detele-option">
                        <input class="delete-all" type="checkbox" name="">
                        <label>
                            تحديد الكل
                        </label>
                        <button class="btn-all">حذف</button>
                    </div>
                    <div class="add-service">
                        <a href="{{route('store.create')}}">
                            <i class="fas fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>أسم المتجر</th>
                            <th>القسم الخاص به</th>
                            <th>الحدث</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr>
                                <td><input class="rocord-check" type="checkbox"></td>
                                <td>{{ $store->id }}</td>
                                <td><a href="{{ route('store.show', $store) }}">{{ $store->name }}</a></td>
                                <td>{{ $store->category->name }}</td>

                                <td>
                                    <a href="{{ route('store.edit', $store->id) }}" class="edit btn btn-primary">تعديل</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-store-{{$store->id}}" >حذف</a>
                                </td>

                                <td>
                                    <a href=""  data-toggle="modal" data-target="#options">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                </td>

                                <div class="modal fade  custom-imodal" id="delete-store-{{$store->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">خذف قسم</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-addpro">
                                                <div class="add-form">
                                                    <div class="contact-page">
                                                        <form action="{{ route('store.destroy', $store->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h2>هل تريد خذف متجر {{ $store->name }} ؟</h2>

                                                            <div class="submit-btn">
                                                                <button type="submit" class="brown">حذف</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
