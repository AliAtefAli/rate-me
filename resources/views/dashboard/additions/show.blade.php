@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>معلومات الاضافة</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.errors')
                @include('dashboard.partials.session')
                <div class="add-form">
                    <div class="contact-page">

                        <div class="form-group">
                            <div class="img-block">
                                <div class="image-company">
                                    <img
                                        src="@if($addition->image) {{ asset('assets/uploads/additions/' . $addition->image) }} @else {{ asset('assets/dashboard/img/user-img.png') }}  @endif"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ $addition->name }}</th>
                                <th>{{ $addition->price }}ر.س</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{!!  $addition->description !!}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
