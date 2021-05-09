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
</head>

<body>

    <header>
        <ul class="top">
            <li>{{Auth::user()->name}}</li>
            <li><a href="/admin">이벤트/상품 관리</a></li>
            <li>
                <div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     로그아웃
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </div>
            </li>
        </ul>

        <div class="logo_search">
            <div class="logo">
                <a href="/admin/index"><i class="fas fa-dice-d6 fa-2x"></i></a>
            </div>

            <form action="#" accept-charset="utf-8" id="search" name="search" method="post">
                <input type="text" name="need_search">

                <button type="submit" form="search"><i class="fas fa-search fa-2x"></i></button>
            </form>

        </div>

        <div class="category">
            <ul>
                <a href="1"><li>예약상품</li></a>
                <a href="2"><li>PlayStation5</li></a>
                <a href="3"><li>PlayStation4</li></a>
                <a href="4"><li>PlayStationVR</li></a>
                <a href="5"><li>PlayStation3</li></a>
                <a href="6"><li>닌텐도Switch</li></a>
                <a href="7"><li>닌텐도3DS</li></a>
                <a href="8"><li>할인상품</li></a>
                <a href="9"><li>기타상품</li></a>
            </ul>
        </div>
    </header>

    @yield('content')

    <footer class="others">
        <ul>
            <li>1111</li>
            <li>2222</li>
            <li>3333</li>
            <li>4444</li>
        </ul>

        <ul>
            <li>111</li>
            <li>222</li>
            <li>333</li>
            <li>444</li>
        </ul>

        <ul>
            <li>11</li>
            <li>22</li>
            <li>33</li>
            <li>44</li>
        </ul>

        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>

    </footer>
    </body>

    @yield('footer')
    <script src="/js/admin.js"></script>

</html>
