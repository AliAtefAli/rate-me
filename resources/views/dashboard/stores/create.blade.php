@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>إضافة قسم</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('store.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" multiple="" id="gallery-photo-add" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img src="" alt="Store image">
                                    </div>
                                </div>
                            </div>
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم المتجر {{$language}}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]">
                                </div>
                                @error("$key.name")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> وصف المتجر {{$language}}</label>
                                    <input class="form-control @error("$key.description") is-invalid @enderror"
                                           type="text" name="{{$key}}[description]">
                                </div>
                                @error("$key.description")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach
                            <div class="form-group">
                                <label>موقع المتجر</label>
                                <div class="select-div">
                                    <input type="text" class="form-control" name="store_site"
                                           value="{{ old('store_site') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>رقم المتجر</label>
                                <div class="select-div">
                                    <input type="text" class="form-control" name="phone"
                                           value="{{ old('phone') }}">
                                </div>
                            </div>
                            @error("phone")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> نوع التوصيل</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="delivery_type"
                                               value="{{ old('delivery_type') }}">
                                    </div>
                                    @error("delivery_type")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label> سعر التوصيل</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="delivery_price"
                                               value="{{ old('delivery_price') }}">
                                    </div>
                                    @error("delivery_price")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label> صاحب المتجر </label>
                                <select class="form-control" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("user")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> القسم الخاص به المتجر </label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("category_id")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                            <div class="submit-btn">
                                <button type="submit" class="brown">إضافة المتجر</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
