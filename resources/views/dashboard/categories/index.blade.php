@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="d-table">
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
                        <a href="{{route('category.create')}}">
                            <i class="fas fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                @include('dashboard.partials.session')
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>أسم القسم</th>
                            <th>وصف القسم</th>
                            <th>الحدث</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><input class="rocord-check" type="checkbox"></td>
                                <td>{{ $category->id }}</td>
                                <td><a href="{{ route('category.show', $category->id) }}" class="text-primary">{{ $category->name }}</a></td>
                                <td>{{ $category->description }}</td>

                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="edit btn btn-primary">تعديل</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#delete-category-{{$category->id}}">حذف</a>
                                </td>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            // Listen for click on toggle checkbox
            $('#select-all').click(function (event) {
                if (this.checked) {
                    // Iterate each checkbox
                    $(':checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@endsection