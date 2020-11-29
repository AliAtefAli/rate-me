@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>إضافة منيو</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('menu.store') }}" method="post">
                            @csrf
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم المنيو {{$language}}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]" value="{{ old("$key.name") }}">
                                </div>
                                @error("$key.name")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> وصف المنيو {{$language}}</label>
                                    <input class="form-control @error("$key.description") is-invalid @enderror"
                                           type="text" name="{{$key}}[description]" value="{{ old("$key.description") }}">
                                </div>
                                @error("$key.description")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="form-group">
                                <label> المتجر الخاص بالمنيو </label>
                                <select class="form-control  @error("$key.description") is-invalid @enderror " name="store_id">
                                    @foreach($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة المنيو</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
