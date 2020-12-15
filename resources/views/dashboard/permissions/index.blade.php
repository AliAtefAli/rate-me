@extends('dashboard.layouts.master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')

    <div class="content">
        <div class="d-table">
            <div class="container">
                <div class="table-option">
                    <div class="detele-option">
                        <input id="select-all" class="delete-all" type="checkbox" name="">
                        <label for="select-all"> تحديد الكل</label>
                        <a href="#" class="btn btn-danger" data-toggle="modal"
                           data-target="#delete-permissions">حذف</a>
                    </div>
                    <div class="add-service">
                        <a href="#" data-toggle="modal" data-target="#add-permission">
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
                            <th>#</th>
                            <th>الأسم</th>
                            <th>الاسم الظاهري</th>
                            <th>الوصف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td><input class="rocord-check" type="checkbox" name="item[]" value="{{ $permission->id }}">
                                </td>
                                <td>{{ $permission->id }}</td>
                                <td><a href="{{ route('permission.show', $permission) }}" class="text-primary">{{ $permission->name }}</a>
                                </td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{!!  $permission->description !!}</td>

                                <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-permission-{{$permission->id}}">تعديل</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-permission-{{$permission->id}}">حذف</a>
                                </td>

                                @include('dashboard.permissions.modal_edit')
                                @include('dashboard.permissions.modal_delete')
                            </tr>
                        @endforeach
                        @include('dashboard.permissions.modal_create')
                        </tbody>
                    </table>
                    {{ $permissions->links() }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection

