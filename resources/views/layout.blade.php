<html>

<head>
    @yield('header')

    <title>TEAM NO.14의 게임 쇼핑몰</title>
    <meta name="description" content="TEAM NO.14의 게임 쇼핑몰" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a5f3739fb3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>

<body>

    <header>
        <ul class="top">
            @guest
                @if(Route::has('login'))
                <li><a href="/login">로그인</a></li>
                @endif
                @if(Route::has('register'))
                <li><a href="/register">회원가입</a></li>
                @endif
            @else
                <li>{{Auth::user()->name}}</li>
                @if(Auth::user()->id<3)
                <li><a href="/admin">이벤트/상품 관리</a></li>
                @else
                <li><a href="/orderList">주문내역</a></li>
                <li><a href="/cart">장바구니@if(session()->has('cartNum'))({{ session('cartNum') }})@endif</a></li>
                @endif
            <li>
                <div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     로그아웃
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </div>
            </li>
            @endguest
        </ul>

        <div class="logo_search">
            <div class="logo">
                <a href="/"><i class="fas fa-dice-d6 fa-2x"></i></a>
            </div>

            <form action="#" accept-charset="utf-8" id="search" name="search" method="post">
                @csrf
                <input type="text" name="name">

                <button type="submit" formaction="/products/all" ><i class="fas fa-search fa-2x"></i></button>
            </form>

        </div>

        <div class="category">
            <ul>
                <a href="/products/PlayStation5"><li>PlayStation5</li></a>
                <a href="/products/PlayStation4"><li>PlayStation4</li></a>
                <a href="/products/PlayStationVR"><li>PlayStationVR</li></a>
                <a href="/products/PlayStation3"><li>PlayStation3</li></a>
                <a href="/products/닌텐도Switch"><li>닌텐도Switch</li></a>
                <a href="/products/닌텐도3DS"><li>닌텐도3DS</li></a>
            </ul>
        </div>
    </header>

    @yield('content')

    <footer class="others">
        <ul>
            <li>사업자 정보</li>
            <li>2222</li>
            <li>3333</li>
            <li>4444</li>
        </ul>

        <ul>
            <li>이용약관</li>
            <li>222</li>
            <li>333</li>
            <li>444</li>
        </ul>

        <ul>
            <li>개인정보 관리 방침</li>
            <li>22</li>
            <li>33</li>
            <li>44</li>
        </ul>


    </footer>
    @yield('footer')
</body>


</html>
