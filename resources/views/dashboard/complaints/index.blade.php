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
                </div>
                @include('dashboard.partials.session')
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>صاحب الرسالة</th>
                            <th>موضوع الرسالة</th>
                            <th>نص الرسالة</th>
                            <th>عرض</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($complaints as $complaint)
                            <tr>
                                <td><input class="rocord-check" type="checkbox"></td>
                                <td>{{ $complaint->id }}</td>
                                <td>{{ $complaint->name }}</td>
                                <td>{{ $complaint->message_subject }}</td>
                                <td>{{ $complaint->message }}</td>
                                <td><a href="{{ route('complaint.show', $complaint->id) }}" class="btn btn-primary">عرض </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $complaints->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
@endsection
