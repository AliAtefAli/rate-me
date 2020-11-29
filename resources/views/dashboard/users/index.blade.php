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
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>التسلسل</th>
                            <th>الأسم</th>
                            <th>الصورة</th>
                            <th>الرقم</th>
                            <th>الإيميل</th>
                            <th>الوظيفة</th>
                            <th>الحدث</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><input class="rocord-check" type="checkbox" name="item[]" value="{{ $user->id }}"></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/users/' . $user->image) }}" alt="Image"
                                         width="50">
                                </td>

                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>

                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="edit btn btn-primary">تعديل</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#delete-user-{{$user->id}}">حذف</a>
                                </td>

                                <div class="modal fade  custom-imodal" id="delete-user-{{$user->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">خذف المستخدم</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-addpro">
                                                <div class="add-form">
                                                    <div class="contact-page">
                                                        <form action="{{ route('user.destroy', $user->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h2>هل تريد خذف هذا المستخدم ؟</h2>

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

                                <div class="modal fade  custom-imodal" id="delete-users" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">خذف متعدد</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-addpro">
                                                <div class="add-form">
                                                    <div class="contact-page">
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h2>هل تريد خذف هذا المستخدم ؟</h2>

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
