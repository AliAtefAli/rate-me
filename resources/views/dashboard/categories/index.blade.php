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
                    <button class="btn-all">حذف</button>
                </div>
                <div class="add-service">
                    <a href="#" data-toggle="modal" data-target="#add-category">
                        <i class="fas fa-plus-square"></i>
                    </a>
                </div>
                @include('dashboard.categories.modal_create')
            </div>
            @include('dashboard.partials.session')
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>رقم</th>
                        <th>الصورة</th>
                        <th>أسم القسم</th>
                        <th>الحدث</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td><input class="rocord-check" type="checkbox"></td>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img
                                    src="@if($category->image) {{ asset('assets/uploads/categories/' . $category->image ) }} @else {{ asset('assets/dashboard/img/offers.jpg') }}  @endif"
                                    width="50"></td>
                            <td><a href="{{ route('category.show', $category->id) }}"
                                   class="text-primary">{{ $category->name }}</a></td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        اختيارات
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                           data-target="#edit-category-{{$category->id}}">تعديل</a>
                                        <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                           data-target="#delete-category-{{$category->id}}">حذف</a>
                                    </div>
                                </div>
                            </td>
                            @include('dashboard.categories.modal_edit')
                            <div class="modal fade  custom-imodal" id="delete-category-{{$category->id}}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">خذف قسم</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body custom-addpro">
                                            <div class="add-form">
                                                <div class="contact-page">
                                                    <form action="{{ route('category.destroy', $category->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h2>هل تريد خذف قسم "{{ $category->name }} " ؟</h2>

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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/image-preview.js') }}"></script>
@endsection
