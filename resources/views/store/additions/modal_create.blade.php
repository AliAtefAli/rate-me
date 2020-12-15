<div class="modal fade" id="add-addition" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">اضافة اضافة</h5>

            </div>
            <div class="modal-body">

                <form action="{{ route('addition.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="img-block">
                            <div class="upload-img">
                                <i class="fas fa-camera text-white brown"></i>
                                <input type="file" id="gallery-photo-add" name="image">
                            </div>
                            <div><img src="{{ asset('assets/dashboard/img/user-img.png') }}" alt="Store image">
                            </div>
                        </div>
                    </div>

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> اسم الاضافة {{$language}}</label>
                            <input id="{{$key}}name" class="form-control" name="{{$key}}[name]" value="{{ old("$key.name") }}">
                        </div>
                        @error("$key.description")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endforeach

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> وصف الاضافة {{$language}}</label>
                            <input id="{{$key}}description" type="hidden" name="{{$key}}[description]" value="{{ old("$key.description") }}">
                            <trix-editor input="{{$key}}description"></trix-editor>

                            @error("$key.description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label> سعر الاضافة </label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ old("price") }}">
                    </div>
                    @error("price")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label> كمية الاضافة </label>
                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                               value="{{ old("quantity") }}">
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
