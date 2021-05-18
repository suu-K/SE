@extends('layout')

@section('header')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <form class="stfSearch">
        <p6 style="font-size: 25px;">SEARCH for PRODUCT</p6>
        <div>
            <span>가격대<input type="text">~<input type="text"></span>
            제품명<input type="text">
            <select name="platform" size="1" style="margin-left: 50px;">
                <option selected="selected">===선택===</option>
                <option value="PlayStation5">PlayStation5</option>
                <option value="PlayStation4">PlayStation4</option>
                <option value="PlayStationVR">PlayStationVR</option>
                <option value="PlayStation3">PlayStation3</option>
                <option value="닌텐도Switch">닌텐도Switch</option>
                <option value="닌텐도3DS">닌텐도3DS</option>
            </select>
            <button type="submit" formaction="#" style="margin-left: 50px;">검색하기</button>
        </div>
    </form>

    <div class="display">
        <div class="resultSort">
            dsfdf에 대한 검색결과
            <ul>
                <li><a href="#">낮은 가격순</a></li>
                <li><a href="#">높은 가격순</a></li>
                <li><a href="#">이름순</a></li>
            </ul>
        </div>
        <div class="items">
            @empty($products)
            <div>상품 준비중입니다</div>
            @endempty
            @foreach($products as $product)
            <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
            @endforeach
        </div>
        <nav class="paging"></nav>
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/products.js') }}"></script>
@endsection
