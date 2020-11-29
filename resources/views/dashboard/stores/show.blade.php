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
                        <form action="{{ route('store.update', $store) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="img-block">
                                    <div class="upload-img">
                                        <i class="fas fa-camera text-white brown"></i>
                                        <input type="file" multiple="" id="gallery-photo-add" name="images[]">
                                    </div>
                                    <div class="image-company">
                                        <img src="img/user-img.png" alt="">
                                    </div>
                                    <div class="gallery">
                                        <div class="images">
                                            <img src="img/user-img.png"><input name="images[]" type="hidden">
                                            <button class="close">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> أسم المتجر </label>
                                <div class="select-div">
                                    <input type="text" class="form-control" value="{{ $store->name }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>موقع المتجر</label>
                                <div class="select-div">
                                    <input type="text" class="form-control" value="{{ $store->store_site }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>الوصف </label>
                                <div class="select-div">
                                    <input type="text" class="form-control" value="{{ $store->description }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>التوصيل</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input type="text" class="form-control" value="{{ $store->delivery_price }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <button type="button" class="changPass" data-toggle="modal"
                                        data-target="#changPass">تغير كلمة المرور</button>
                            </div>
                            <div class="submit-btn">
                                <button type="submit" class="brown">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-serv changPass add-form " id="changPass" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="">كلمة المرور القديمة</label>
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" />
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">كلمة المرور الجديدة</label>
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" />
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">تأكيد كلمة المرور الجديدة</label>
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور" />
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="submit-btn">
                            <button type="submit" class="brown" data-dismiss="modal">حفظ التعديلات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
