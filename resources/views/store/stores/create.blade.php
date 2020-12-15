<div class="modal fade" id="add-store" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">اضافة
                    متجر</h5>

            </div>
            <div class="modal-body">
                <form action="{{ route('store.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="img-block">
                            <div class="upload-img">
                                <input type="file" multiple="" id="gallery-photo-add" name="image">
                            </div>
                            <div class="image-company">
                                <img class="img-preview" src="{{ asset('assets/dashboard/img/user-img.png') }}"
                                     alt="Store image">
                            </div>
                        </div>
                    </div>

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> إسم المتجر {{$language}}</label>
                            <input class="form-control @error("$key.name") is-invalid @enderror"
                                   type="text" name="{{$key}}[name]" value="{{old("$key.name")}}">
                        </div>
                        @error("$key.name")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach

                    @foreach(config("app.languages") as $key => $language)
                        <label> وصف القسم {{$language}}</label>
                        <input id="{{$key}}description" type="hidden" name="{{$key}}[description]" value="{{ old("$key.description") }}">
                        <trix-editor input="{{$key}}description"></trix-editor>

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
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label> نوع التوصيل</label>
                        <div class="phone-in">
                            <div class="select-div">
                                <input type="text" class="form-control" name="delivery_type"
                                       value="{{ old('delivery_type') }}">
                            </div>
                            @error("delivery_type")
                            <div class="alert alert-danger">{{ $message }}</div>
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
                            <div class="alert alert-danger">{{ $message }}</div>
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
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="submit-btn">
                        <button type="submit" class="brown">إضافة المتجر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
