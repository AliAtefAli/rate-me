@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>إضافة منتج</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('product.store') }}" method="post">
                            @csrf
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم المنتج  {{$language}}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]" value="{{ old("$key.name") }}">
                                </div>
                                @error("$key.name")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> وصف المنتج  {{$language}}</label>
                                    <input class="form-control @error("$key.description") is-invalid @enderror"
                                           type="text" name="{{$key}}[description]" value="{{ old("$key.description") }}">
                                </div>
                                @error("$key.description")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="form-group">
                                <label> سعر المنتج </label>
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old("price") }}" >
                            </div>
                            @error("price")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> كمية المنتج </label>
                                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old("quantity") }}" >
                                @error("quantity")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label> المنيو </label>
                                <select class="form-control" name="menu_id">
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("menu_id")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة المنتج </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
