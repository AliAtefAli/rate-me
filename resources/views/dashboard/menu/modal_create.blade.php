<div class="modal fade" id="add-menu" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">اضافة
                    منيو</h5>

            </div>
            <div class="modal-body">
                <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="img-block">
                            <div class="">
                                <input type="file" id="gallery-photo-add" name="image">
                            </div>
                            <div class="image-company">
                                <img class="img-preview" src="{{ asset('assets/dashboard/img/user-img.png') }}"
                                     alt="Store image">
                            </div>
                        </div>
                    </div>

                    @foreach(config("app.languages") as $key => $language)
                        <div class="form-group">
                            <label> إسم المنيو {{$language}}</label>
                            <input
                                class="form-control @error("$key.name") is-invalid @enderror"
                                type="text" name="{{$key}}[name]"
                                value="{{ old("$key.name") }}">
                        </div>
                        @error("$key.name")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endforeach

                    <input type="hidden" name="store_id"
                           value="{{ $store->id }}">
                    <div class="submit-btn">
                        <button type="submit" class="brown">إضافة المنيو
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
