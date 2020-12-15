@extends('dashboard.layouts.master')

@section('content')

    <div class="content">
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                <div class="custom-title">
                    <h3>الصلاحيات الخاصة بوظيفة "{{ $role->display_name }}" </h3>
                </div>
                <div class="add-form">
                    <div class="contact-page">

                        @foreach($permissions as $permission)
                            <div class="form-group">
                                <div class="form-check">
                                    <input name="permissions[]" type="checkbox" value="{{ $permission->name }}"
                                           @if( in_array($permission->id, $permissionsId)) checked @endif
                                           id="{{ $permission->name }}" disabled>
                                    <label class="form-check-label"
                                           for="{{ $permission->name }}">{{ $permission->display_name }}</label>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
