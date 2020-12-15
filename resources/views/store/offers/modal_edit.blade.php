<div class="modal fade  custom-imodal" id="edit-offer-{{$offer->id}}"
     tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">خذف منتج</h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-addpro">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('offer.update', $offer) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">صورة العرض</label>
                                <div class="img-block">
                                    <div class="">
                                        <input type="file" id="img-input" name="image">
                                    </div>
                                    <div class="image-company">
                                        <img src="{{ asset('assets/uploads/offers/' .  $offer->image ) }}" width="100" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">عنوان العرض</label>
                                <div class="">
                                    <input type="url" name="url" value="{{ $offer->url }}" class="form-control">
                                </div>
                            </div>

                            <div class="submit-btn">
                                <button type="submit" class="brown">اضافة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
