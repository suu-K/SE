@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/orderList.css') }}"/>
@endsection

@section('content')
<div id="orderList">
        <div id="range">
            <ul id="selector">
                <li @if($date == 'today') style="background-color: dodgerblue" @endif><a href="/orderList/today">오늘</a></li>
                <li @if($date == 'week') style="background-color: dodgerblue" @endif><a href="/orderList/week">최근 일주일</a></li>
                <li @if($date == 'month') style="background-color: dodgerblue" @endif><a href="/orderList/month">1개월</a></li>
                <li @if($date == null) style="background-color: dodgerblue" @endif><a href="/orderList">전체</a></li>
            </ul>
        </div>
        <div id="list">
            <ul>
                <li class="contents">
                    <ul class="contentForm">
                        <li class="date">주문일시</li>
                        <li class="stfName">상품명</li>
                        <li class="state">주문상태</li>
                        <li class="price">결제금액</li>
                    </ul>
                    <p class="additional"></p>
                </li>
                @foreach($orderLists as $orderList)
                <li class="contents">
                    <ul class="contentForm" onclick="window.open('/ordersebu/{{ $orderList->id }}','window_name','width=430,height=500,location=no,status=no,scrollbars=yes');">
                        <li class="date">{{ $orderList->created_at}}</li>
                        <li class="stfName">{{ $orderList->name}}</li>
                        @switch($orderList->state)
                        @case(0)
                            <li class="state">결제완료</li>
                            @break
                        @case(1)
                            <li class="state">배송중</li>
                            @break
                        @case(2)
                            <li class="state">배송완료</li>
                            @break
                        @case(3)
                            <li class="state">구매확정</li>
                            @break
                        @endswitch
                        <li class="price">{{ $orderList->price}}</li>

                    </ul>
                    @switch($orderList->state)
                        @case(0)
                        @case(1)
                            @if($orderList->question)
                                <p class="additional"><a href="/questionlist">문의확인</a></p>
                            @else
                                <p class="additional"><a href="/question/{{ $orderList->id }}">문의하기</a></p>
                            @endif
                            @break
                        @case(2)
                            <p class="additional"><a href="/orderConfirm/{{ $orderList->id }}">구매확정</a></p>
                            @break
                        @case(3)
                            @if($orderList->comment)
                            <p class="additional"><a href="/product/detail/{{ $orderList->product_id }}">상품평</a></p>
                            @else
                            <p class="additional"><a onclick="window.open('/review/{{ $orderList->id }}/{{ $orderList->product_id}}','window_name','width=480,height=500,location=no,status=no,scrollbars=yes');">상품평</a></p>
                            @endif
                            @break
                        @endswitch
                </li>
                @endforeach
            </ul>
        </div>
        <br>
        <br>
        {{ $orderLists->withQueryString()->links() }}
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/orderList.js') }}"></script>
@endsection
