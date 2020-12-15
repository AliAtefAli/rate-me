<div class="modal fade" id="edit-store-{{$store->id}}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">تعديل
                    متجر</h5>

            </div>
            <div class="modal-body">
                <form action="{{ route('store.update', $store->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="img-block">
                            <div class="upload-img">
                                <input type="file" multiple="" id="gallery-photo-add" name="image">
                            </div>
                            <div class="image-company">
                                <img class="img-preview" src="{{ asset('assets/uploads/stores/' . $store->image) }}"
                                     alt="Store image">
                            </div>
                        </div>
                    </div>
                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> إسم المتجر {{$language}}</label>
                            <input class="form-control @error("$key.name") is-invalid @enderror"
                                   type="text" name="{{$key}}[name]" value="{{$store->translate($key)->name }}">
                        </div>
                        @error("$key.name")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> وصف المتجر {{$language}}</label>
                            <trix-editor input="{{$key}}.description"></trix-editor>
                        </div>
                        <input id="{{$key}}.description" type="hidden" name="{{$key}}[description]"
                               value="{{ $store->translate($key)->description }}">
                        @error("$key.description")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach
                    <div class="form-group">
                        <label>موقع المتجر</label>
                        <div class="select-div">
                            <input type="text" class="form-control" name="store_site"
                                   value="{{ $store->store_site }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>رقم المتجر</label>
                        <div class="select-div">
                            <input type="text" class="form-control" name="phone"
                                   value="{{ $store->phone }}">
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
                                       value="{{ $store->delivery_type }}">
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
                                       value="{{ $store->delivery_price }}">
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
                                <option value="{{ $user->id }}" @if($user) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("user")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="submit-btn">
                        <button type="submit" class="brown">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
