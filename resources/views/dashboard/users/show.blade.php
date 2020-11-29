@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="orders">
            <div class="container">
                <div class="custom-title">
                    <h3>الملف الشخصي</h3>
                </div>
            </div>
        </div>

        <div class="orders">
            <div class="container">

            </div>
        </div>
        <div class="add-offer">
            <div class="container">
                @include('dashboard.partials.session')
                <div class="add-form">
                    <div class="contact-page">
                        <form action="">
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
                                <label> أسم المستخدم </label>
                                <div class="select-div">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>رقم الجوال</label>
                                <div class="phone-in">
                                    <div class="select-div">
                                        <input type="text" class="form-control" name="phone"
                                               value="{{ $user->phone }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <div class="select-div">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <div class="select-div">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <a class="btn btn-primary" data-toggle="modal"
                                   data-target="#changPass">تغير كلمة المرور</a>

                                <a class="btn btn-success" data-toggle="modal"
                                   data-target="#changeRole">تغير الوظيفة الخاصة به</a>
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
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">كلمة المرور الجديدة</label>
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
                            <i class="left-icon fas fa-eye eye"></i>
                        </div>
                        <div class="form-group">
                            <label for="">تأكيد كلمة المرور الجديدة</label>
                            <input class="form-control" type="password" placeholder="الرجاء إدخال كلمة المرور"/>
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

    <div class="modal fade add-serv changPass add-form " id="changeRole" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label> وظيفة المستخدم</label>

                            <select class="form-control" name="role">
                                <option value="admin">أدمن</option>
                                <option value="store">صاحب متجر</option>
                                <option value="user">مستخدم</option>
                            </select>
                        </div>
                        @error("role")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="submit-btn">
                            <button type="submit" class="brown" data-dismiss="modal">حفظ التعديلات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
