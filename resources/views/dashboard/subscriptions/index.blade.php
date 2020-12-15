@extends('dashboard.layouts.master')

@section('content')
    <div class="content">
        <div class="latest-offers">
            <div class="container">
                <div class="bg-wihte">
                    <div class="company-info">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info-item b-shadow">
                                        <div class="img-block brown">
                                            <img src="{{ asset('assets/dashboard/img/bill (1).png') }}" alt="">
                                        </div>
                                        <div class="info-text">
                                                <span>
                                                    نهايه الاشتراك الحالي
                                                    <span class="end-date"> 12 \ 8 \ 2020</span>
                                                </span>
                                            <a href="#" class="joins-ach">
                                                سجل الاشتراكات
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plans">
                        <div class="container">
                            <div class="row">

                                @foreach($subscriptions as $subscription)
                                    <div class="col-md-4">
                                        <div class="plan-item">
                                            <div class="imgs">
                                                <img src="{{ asset('assets/uploads/subscriptions/' . $subscription->image) }}" alt="">
                                            </div>
                                            <div class="txt">
                                                <p class="name">الاشتراك</p>
                                                <p class="type">{{ $subscription->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="plans-pay">
                        <h3>باقات الدفع </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                            الحروف التى يولدها التطبيق.
                        </p>
                        <form action="">
                            <ul class="pay-way">
                                <li>
                                    <label class="checkcontainer">
                                        <div class="img">
                                            <img src="{{ asset('assets/dashboard/img/visa.png') }}" alt="">
                                        </div>
                                        <input type="radio" checked="checked" name="radio">
                                        <span class="radiobtn"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkcontainer">
                                        <div class="img">
                                            <img src="{{ asset('assets/dashboard/img/master.png') }}" alt="">
                                        </div>
                                        <input type="radio" name="radio">
                                        <span class="radiobtn"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkcontainer">
                                        <div class="img">
                                            <img src="{{ asset('assets/dashboard/img/paypal.png') }}" alt="">
                                        </div>
                                        <input type="radio" name="radio">
                                        <span class="radiobtn"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkcontainer">
                                        <div class="img">
                                            <img src="{{ asset('assets/dashboard/img/Mada_Logo.png') }}" alt="">
                                        </div>
                                        <input type="radio" name="radio">
                                        <span class="radiobtn"></span>
                                    </label>
                                </li>
                            </ul>
                            <button class="btn site-btn brown"> ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('assets/dashboard/js/select-all.js') }}"></script>
@endsection
