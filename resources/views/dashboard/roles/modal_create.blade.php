<div class="modal fade  custom-imodal" id="add-role" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة وظيفة</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-addpro">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label> إسم الوظيفة</label>
                                <input class="form-control" type="text" name="name"
                                       value="{{ old("name") }}">
                            </div>
                            @error("name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>الاسم الظاهري </label>
                                <input class="form-control" type="text"
                                       name="display_name"
                                       value="{{ old("display_name") }}">
                            </div>
                            @error("display_name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> وصف الوظيفة</label>
                                <input id="c.description" type="hidden" name="description">
                                <trix-editor input="c.description"></trix-editor>
                            </div>
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <button class="btn btn-success">اضافة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
