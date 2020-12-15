@extends('dashboard.layouts.master')

@section('content')

    <div class="content">
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                <div class="custom-title">
                    <h3>الصلاحيات الخاصة بوظيفة "{{ $role->display_name }}" </h3>
                </div>
                <div class="custom-title">
                    <div class="detele-option">
                        <input id="select-all" class="delete-all" type="checkbox" name="">
                        <label for="select-all">
                            تحديد الكل
                        </label>
                    </div>
                </div>
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('save.permission', $role) }}" method="post">
                            @csrf
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label"
                                                       for="{{ $permission->name }}">{{ $permission->display_name }}</label>
                                                <input name="permissions[]"
                                                       @if( in_array($permission->id, $permissionsIds)) checked
                                                       @endif  type="checkbox" value="{{ $permission->name }}"
                                                       id="{{ $permission->name }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">حفظ التغيرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
@endsection
