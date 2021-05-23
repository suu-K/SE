@extends('layout')

@section('header')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <form class="stfSearch" method="POST">
        @csrf
        <p6 style="font-size: 25px;">SEARCH for PRODUCT</p6>
        <div>
            <span>가격대<input type="text" name="min" autocomplete="off" value="{{ session()->get('min') }}" >~<input type="text" name="max" value="{{ session()->get('max') }}"></span>
            제품명<input type="text" name="name" autocomplete="off" value="{{ session()->get('name') }}">
            <select name="category" size="1" style="margin-left: 50px;">
                <option selected="selected">===선택===</option>
                <option value="PlayStation5" @if(session()->get('category') == 'PlayStation5') selected @endif>PlayStation5</option>
                <option value="PlayStation4" @if(session()->get('category') == 'PlayStation4') selected @endif>PlayStation4</option>
                <option value="PlayStationVR" @if(session()->get('category') == 'PlayStationVR') selected @endif>PlayStationVR</option>
                <option value="PlayStation3" @if(session()->get('category') == 'PlayStation3') selected @endif>PlayStation3</option>
                <option value="닌텐도Switch" @if(session()->get('category') == '닌텐도Switch') selected @endif>닌텐도Switch</option>
                <option value="닌텐도3DS" @if(session()->get('category') == '닌텐도3DS') selected @endif>닌텐도3DS</option>
            </select>
            <select name="order">
                <option value="none">최신순</option>
                <option value="asc" @if(session()->get('order') == 'asc') selected @endif>낮은가격순</option>
                <option value="desc" @if(session()->get('order') == 'desc') selected @endif>높은가격순</option>
                <option value="nameOrder" @if(session()->pull('order') == 'nameOrder') selected @endif>이름순</option>
            </select>
            <button type="submit" formaction="/products" style="margin-left: 50px;">검색하기</button>
        </div>
    </form>

    <div class="display">


        <div class="resultSort">
            @if(session()->has('category')) {{ session()->pull('category') }} @endif
            @if(session()->has('name')) {{ session()->pull('name') }} @endif
            @if(session()->has('min') && session()->has('max')) {{ session()->pull('min') }}~{{ session()->pull('max') }}
            @elseif(session()->has('min')) {{ session()->pull('min') }}~
            @elseif(session()->has('max')) ~{{ session()->pull('max') }}
            @else
            @endif
            에 대한 검색결과
        </div>
        <div class="items">
            @empty($products)
            <div>상품 준비중입니다</div>
            @endempty
            @foreach($products as $product)
            @if(Auth::id()<3)
                @if($product->deleted_at == null)
                <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
                @else
                <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }} - 삭제됨</div></div></a>
                @endif
            @elseif($product->deleted_at == null)
                <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
            @endif
            @endforeach
        </div>
        {{ $products->withQueryString()->links() }}
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/products.js') }}"></script>
@endsection
