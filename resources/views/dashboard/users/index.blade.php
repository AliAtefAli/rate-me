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
                    <a href="#" class="btn btn-danger" data-toggle="modal"
                       data-target="#delete-users">حذف</a>
                </div>
                <div class="add-service">
                    <a href="{{route('user.create')}}">
                        <i class="fas fa-plus-square"></i>
                    </a>
                </div>
            </div>
            @include('dashboard.partials.session')
            <div class="table-responsive text-center">
                <table id="example" class="table" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>الأسم</th>
                        <th>الرقم</th>
                        <th>الإيميل</th>
                        <th>الوظيفة</th>
                        <th>الحدث</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td><input class="rocord-check" type="checkbox" name="item[]" value="{{ $user->id }}"></td>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ route('user.show', $user) }}" class="text-primary">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td> @if ($user->role) {{$user->role->display_name}} @endif </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        اختيارات
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="#" class="dropdown-item text-primary" data-toggle="modal"
                                           data-target="#changePassword">تغير كلمة المرور</a>
                                        <a href="#" class="dropdown-item text-success" data-toggle="modal"
                                           data-target="#changeRole">تغير الوظيفة الخاصة به</a>
                                        <a href="{{ route('user.edit', $user->id) }}"
                                           class="dropdown-item text-secondary">تعديل</a>
                                        <a href="#" class="dropdown-item text-danger" data-toggle="modal"
                                           data-target="#delete-user-{{$user->id}}">حذف</a>
                                    </div>
                                </div>
                            </td>
                            @include('dashboard.users.modal_delete')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
                @include('dashboard.users.modal_multi_delete')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
@endsection
