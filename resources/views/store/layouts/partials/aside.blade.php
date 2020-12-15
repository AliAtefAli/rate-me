<aside>
    <div class="user-side">
        <div class="user-img">
            <img
                src="@if($store->image) {{ asset('assets/uploads/store/' . $store->image ) }} @else {{ asset('assets/dashboard/img/user-img.png') }} @endif"
                alt="porfile">
        </div>
        <p>{{ $store->name }}</p>
    </div>
    <ul>
        <li>
            <a href="{{ route('store.store.home') }}">
                <i class="fas fa-home"></i>
                <span>الرئيسية</span>
            </a>
        </li>

        <li>
            <a href="javascript::void()" class="dorpdown-list">
                <i class="fa fa-gift"></i>
                <span>المنيو </span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('store.menu.index') }}">عرض الكل</a>
                </li>
                <li>
                    <a href="{{ route('store.menu.create') }}">إضافة</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('store.store.index') }}">
                <i class="fas fa-cog"></i>
                <span>اعدادات المتجر </span>
            </a>
        </li>

        <li>
            <a href="{{ route('message.index') }}">
                <i class="fas fa-phone-volume"></i>
                <span>الرسائل</span>
            </a>
        </li>
    </ul>
</aside>
