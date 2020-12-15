<div class="modal fade" id="edit-addition-{{$addition->id}}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">تعديل اضافة</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('addition.update', $addition) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="img-block">
                            <div class="upload-img">
                                <i class="fas fa-camera text-white brown"></i>
                                <input type="file" multiple="" id="gallery-photo-add" name="image">
                            </div>
                            <div><img src="{{ asset('assets/uploads/additions/' . $addition->image) }}" width="150"
                                      alt="Store image">
                            </div>
                        </div>
                    </div>

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> إسم الاضافة {{$language}}</label>
                            <input class="form-control @error("$key.name") is-invalid @enderror"
                                   type="text" name="{{$key}}[name]" value="{{ $addition->translate($key)->name  }}">
                        </div>
                        @error("$key.name")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> وصف القسم {{$language}}</label>
                            <input id="{{$key}}description{{$addition->id}}" type="hidden" name="{{$key}}[description]"
                                   value="{{ $addition->translate($key)->description  }}">
                            <trix-editor input="{{$key}}description{{$addition->id}}"></trix-editor>

                            @error("$key.description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label> سعر الاضافة </label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ $addition->price }}">
                    </div>
                    @error("price")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label> كمية الاضافة </label>
                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                               value="{{ $addition->quantity }}">
                        @error("quantity")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="submit-btn">
                        <button type="submit" class="brown">إضافة الاضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
