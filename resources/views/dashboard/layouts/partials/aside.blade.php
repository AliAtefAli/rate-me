<aside>
    <div class="user-side">
        <div class="user-img">
            <img
                src="@if($site->logo) {{ asset('assets/uploads/site/' . $site->logo ) }} @else {{ asset('assets/dashboard/img/user-img.png') }} @endif"
                alt="porfile">
        </div>
        <p>{{ $site->name }}</p>
    </div>
    <ul>
        <li>
            <a href="{{ route('dashboard.home') }}">
                <i class="fas fa-home"></i>
                <span>الرئيسية</span>
            </a>
        </li>


        <li>
            <a href="javascript::void();" class="dorpdown-list">
                <i class="fas fa-users"></i>
                <span>الأعضاء</span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('user.index') }}">عرض الكل</a>
                </li>
                <li>
                    <a href="{{ route('user.create') }}">إضافة</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript::void();" class="dorpdown-list">
                <svg xmlns="http://www.w3.org/2000/svg" width="23.446" height="24.184"
                     viewBox="0 0 23.446 24.184">
                    <g id="service" transform="translate(-3.39 -1.93)">
                        <path id="Path_212" data-name="Path 212"
                              d="M3.39,24.81V3.233A1.3,1.3,0,0,1,4.7,1.93h6.288a3.919,3.919,0,0,0-.5,1.934v.674H6V22.71l9.508-4.7a1.3,1.3,0,0,1,1.871,1.167,1.892,1.892,0,1,0,3.773,0V15.707h2.631v3.466A4.508,4.508,0,0,1,20.1,23.6L4.7,26.113a1.3,1.3,0,0,1-1.3-1.3Zm9.1-13.052V3.864A1.934,1.934,0,0,1,14.427,1.93H24.9a1.934,1.934,0,0,1,1.934,1.934v7.893A1.934,1.934,0,0,1,24.9,13.692H19.574l-.013.018-2.5,2.493a.392.392,0,0,1-.672-.277V13.694H14.427a1.934,1.934,0,0,1-1.934-1.937Zm5.318-6.51a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,5.248Zm0,2.46a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,7.708Zm0,2.46a.687.687,0,0,0,.687.687h4.5a.687.687,0,1,0,0-1.373H18.5A.687.687,0,0,0,17.811,10.168ZM15.65,5.248a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Zm0,2.46a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Zm0,2.46a.687.687,0,1,0,.687-.687.687.687,0,0,0-.687.687Z"
                              transform="translate(0 0)" fill="#fff"/>
                    </g>
                </svg>
                <span>الأقسام</span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('category.index') }}">عرض الكل</a>
                </li>
                <li>
                    <a href="{{ route('category.create') }}">إضافة</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript::void();" class="dorpdown-list">
                <svg xmlns="http://www.w3.org/2000/svg" width="23.472" height="20.551"
                     viewBox="0 0 23.472 20.551">
                    <g id="order" transform="translate(-3.7 -9.525)">
                        <path id="Path_216" data-name="Path 216"
                              d="M4.46,12.434l.862-.253h0L7.4,11.547v5.12l2.383-.456V10.837l2.129-.634,2.155-.634c.025,0,.051,0,.051-.025h.051a.96.96,0,0,1,.38,0H14.6c.025,0,.051,0,.051.025l4,1.191a6.384,6.384,0,0,0-1.217,1.825l-2.053-.608v15.64l7.528-2.256V20.8h.025a6.176,6.176,0,0,0,2.079-.38v5.7a1.08,1.08,0,0,1-.76,1.014l-9.582,2.89a.938.938,0,0,1-.608,0L4.46,27.136a1.035,1.035,0,0,1-.76-1.014V13.448A1.035,1.035,0,0,1,4.46,12.434Zm18.479-1.8a4.233,4.233,0,1,1-4.233,4.233A4.241,4.241,0,0,1,22.939,10.634Zm-2.129,4.36.786.786.811.811.811-.811,1.85-1.85-.811-.811-1.85,1.85-.786-.786Z"
                              transform="translate(0)" fill="#fff"/>
                    </g>
                </svg>
                <span>الاشتراكات </span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('subscription.index') }}">عرض الكل</a>
                </li>
                <li>
                    <a href="{{ route('subscription.create') }}">إضافة</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript::void()" class="dorpdown-list">
                <i class="fa fa-gift"></i>
                <span>العروض </span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('offer.index') }}">عرض الكل</a>
                </li>
                <li>
                    <a href="{{ route('offer.create') }}">إضافة</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('site.edit') }}">
                <i class="fas fa-cog"></i>
                <span>اعدادات الموقع </span>
            </a>
        </li>

        <li>
            <a href="{{ route('role.index') }}">
                <i class="fa fa-users-cog"></i>
                <span>الوظائف</span>
            </a>
        </li>

        <li>
            <a href="{{ route('message.index') }}">
                <i class="fas fa-phone-volume"></i>
                <span>الرسائل الواردة</span>
            </a>
        </li>

        <li>
            <a href="{{ route('complaint.index') }}">
                <i class="fas fa-comments"></i>
                <span>الشكاوي والمقترحات</span>
            </a>
        </li>
    </ul>
</aside>

