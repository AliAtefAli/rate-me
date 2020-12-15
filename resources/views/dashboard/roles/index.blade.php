@extends('dashboard.layouts.master')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="table-option">
                <div class="detele-option">
                    <input id="select-all" class="delete-all" type="checkbox" name="">
                    <label for="select-all"> تحديد الكل</label>
                    <a href="#" class="btn btn-danger" data-toggle="modal"
                       data-target="#delete-roles">حذف</a>
                </div>
                <div class="add-service">
                    <a href="#" data-toggle="modal" data-target="#add-role">
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
                        <th>#</th>
                        <th>الأسم</th>
                        <th>الاسم الظاهري</th>
                        <th>الوصف</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td><input class="rocord-check" type="checkbox" name="item[]" value="{{ $role->id }}">
                            </td>
                            <td>{{ $role->id }}</td>
                            <td><a href="{{ route('role.show', $role) }}" class="text-primary">{{ $role->name }}</a>
                            </td>
                            <td>{{ $role->display_name }}</td>
                            <td>{!!  $role->description !!}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        اختيارات
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('edit.permission', $role) }}"
                                           class="dropdown-item text-primary">تعديل الصلاحيات</a>
                                        <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                           data-target="#edit-role-{{$role->id}}">تعديل</a>
                                        <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                           data-target="#delete-role-{{$role->id}}">حذف</a>
                                    </div>
                                </div>
                            </td>
                            @include('dashboard.roles.modal_edit')
                            @include('dashboard.roles.modal_delete')
                        </tr>
                    @endforeach
                    @include('dashboard.roles.modal_create')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection

