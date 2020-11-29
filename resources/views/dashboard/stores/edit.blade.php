@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>معلومات المتجر</h3>
                </div>
            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('store.update', $store->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" multiple="" id="gallery-photo-add" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img src="{{ asset('assets/uploads/stores/' . $store->image ) }}" alt="Store image">
                                    </div>
                                </div>
                            </div>
                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label> أسم المتجر {{ $language }}</label>
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="{{$key}}[name]"
                                               value="{{ $store->translate($key)->name }}">
                                    </div>
                                </div>
                                @error("$key.name")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            @foreach(config('app.languages') as $key => $language)
                                <div class="form-group">
                                    <label> وصف المتجر {{ $language }}</label>
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="{{$key}}[description]"
                                               value="{{ $store->translate($key)->description }}">
                                    </div>
                                </div>
                                @error("$key.description")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach
                            <div class="form-group">
                                <label>رقم المتجر</label>
                                <div class="select-div">
                                    <input type="text" class="form-control" name="phone"
                                           value="{{ $store->phone }}">
                                </div>
                            </div>
                            @error("phone")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>موقع المتجر</label>
                                <div class="select-div">
                                    <input type="text" class="form-control" name="store_site"
                                           value="{{ $store->store_site }}">
                                </div>
                                @error("store_site")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> نوع التوصيل</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="delivery_type"
                                               value="{{ $store->delivery_type }}">
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
                                               value="{{ $store->delivery_price }}">
                                    </div>
                                    @error("delivery_price")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label> القسم الخاص به المتجر </label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $store->category->id) selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("category")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="submit-btn">
                                <button type="submit" class="brown">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
