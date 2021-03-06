<div class="modal fade  custom-imodal" id="edit-category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-addpro">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">صورة القسم</label>
                                <div class="img-block">
                                    <div>
                                        <input type="file" class="img-input" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img class="img-preview" src="{{ asset('assets/uploads/categories/' . $category->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            @csrf
                            @foreach(config("app.languages") as $key => $language)
                                <div class="form-group">
                                    <label> إسم القسم {{$language}}</label>
                                    <input class="form-control @error("$key.name") is-invalid @enderror"
                                           type="text" name="{{$key}}[name]" value="{{ $category->translate($key)->name }}">
                                </div>
                                @error("$key.name")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endforeach

                            <div class="submit-btn">
                                <button type="submit" class="brown">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
