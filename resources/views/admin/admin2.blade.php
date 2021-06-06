@extends('layout')

@section('header')
    <link href="{{asset('css/admin2.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="ctrMenu">
        <aside class="tab">
            <ul>
                <li><a href="/admin">공지/이벤트 관리</a></li>
                <li class="active"><a href="/admin2">상품관리</a></li>
                <li><a href="/admin4">상품 판매 정보</a></li>
                <li><a href="/admin5">고객 문의 관리</a></li>
                <li><a href="/admin6">쿠폰 등록/관리</a></li>
            </ul>
        </aside>
        <div class="ctr">


            <div class="test">
                <form class="find" action="/admin2">
                    @csrf
                    <div style="padding-bottom:10px;">
                        <div>
                            <ul style="display: flex;">
                                <li>이름</li>
                                <li style="padding-left: 280px;">가격대</li>
                                <li style="padding-left:330px;">정렬</li>
                            </ul>
                        </div>
                        <ul style="display: flex;">
                            <li style="margin-right: 140px;">
                                <input type="text" name="name" value="{{ session()->pull('name') }}" autocomplete="off">
                            </li>
                            <li>
                                <input type="number" name="min" class="number" value="{{ session()->pull('min') }}" autocomplete="off">
                            </li>
                            <li style="padding-left: 10px; padding-right: 10px;">~</li>
                            <li>
                                <input type="number" name="max" class="number" value="{{ session()->pull('max') }}" autocomplete="off">
                            </li>
                            <li style="margin-left: 140px;">
                                <select name="order">
                                    <option value="none">=== 선택 ===</option>
                                    <option value="asc" @if(session()->get('order') == 'asc') selected @endif>낮은가격순</option>
                                    <option value="desc" @if(session()->get('order') == 'desc') selected @endif>높은가격순</option>
                                    <option value="nameOrder" @if(session()->pull('order') == 'nameOrder') selected @endif>이름순</option>
                                </select>
                            </li>
                            <li style="margin-left: 20px;">
                                <button formaction="/admin2">검색</button>
                            </li>
                            <li style="margin-left: 20px;">
                                <button type="button" onclick="location.href='/admin/product'">등록</button>
                            </li>
                        </ul>
                    </div>
                </form>

                <ul class="pageadmin">
                    <li>
                        <ul id="attribute">
                            <li style="margin-left:27px;">이름</li>
                            <li style="margin-left:265px;">가격</li>
                            <li style="margin-left:80px;">판매가</li>
                        </ul>
                    </li>

                    @foreach($products as $product)
                    <form action="/product/delete" method="POST">
                        @csrf
                        <li class="stfForm">
                            <div class="name"><a href="/admin3/{{ $product->id }}">{{ $product->name }}</a></div>
                            <div class="price">{{ $product->price }}</div>
                            <div class="buy"> {{ $product->sale_price }}</div>
                            <input type="hidden" name="id" value="{{ $product->id }}"><div class="delete">
                            @if($product->deleted_at == null)
                            <button formaction="/product/softDelete">삭제</button>
                            @else
                            <button formaction="/product/restore">활성화</button>
                            <button type="submit" fromaction="/product/delete">완전삭제</button></div>
                            @endif
                        </li>
                    </form>
                    @endforeach

                </ul>
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/admin2.js') }}"></script>
@endsection
