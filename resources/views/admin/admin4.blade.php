@extends('layout')

@section('header')
    <link href="{{ asset('css/admin4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   <div id="full">
        <div class="ctrMenu">
            <aside class="tab">
                <ul>
                    <li><a href="/admin">공지/이벤트 관리</a></li>
                    <li><a href="/admin2">상품관리</a></li>
                    <li class="active"><a href="/admin4">상품 판매 정보</a></li>
                    <li><a href="/admin5">고객 문의 관리</a></li>
                    <li><a href="/admin6">쿠폰 등록/관리</a></li>
                </ul>
            </aside>
        </div>


        <div>
            <div id="statistic">
                <ul id="income">
                    <li>총 판매금액</li>
                    <li>{{ $sales }}원</li> <!--기간에 따라서 달라져야함-->
                </ul>
                <ul>
                    <li>판매순위 TOP3</li>
                    <div id="ranking">
                        <ul id="categoryRank">
                            @foreach($category as $key => $product)
                            @if($loop->iteration == 4)
                            @break;
                            @endif
                            <li>
                                <ul>
                                    <li>{{ $key }}</li>
                                    <li>{{ $product }}개</li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <ul id="stfRank">
                            @foreach($statistics as $key => $statistic)
                            @if($loop->iteration == 4)
                            @break;
                            @endif
                            <li>
                                <ul>
                                    <li>{{ $key }}</li>
                                    <li>{{ $statistic }}개</li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </ul>
            </div>

            <div id="orderList">
                <form id="range" method="POST">
                    @csrf
                    <ul id="selector">
                        <li>검색기간</li>
                        <li style="display: flex; width: 300px;"><input type="date" name="sdate" value="{{ session()->pull('sdate') }}"></input> ~ <input type="date" name="ldate" value="{{ session()->pull('ldate') }}"></input></li>
                        <li><button formaction="/admin4">검색</button></li>
                    </ul>
                </form>
                <div id="list">
                    <ul>
                        <li class="contents">
                            <ul class="contentForm">
                                <li class="date">주문일시</li>
                                <li class="stfName">상품명</li>
                                <li class="state">주문상태</li>
                                <li class="price">결제금액</li>
                                <li><p class="additional"></p></li>
                            </ul>

                        </li>
                        @foreach($orderLists as $orderList)
                        <li class="contents">
                            <form action="">
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
                                <form>
                                @if($orderList->state == 0)
                                        <p class="additional"><button formaction="/orderUpdate/{{$orderList->id}}">배송하기</button></p>
                                @elseif($orderList->state == 1)
                                        <p class="additional"><button formaction="/orderUpdate/{{$orderList->id}}">배송완료</button></p>
                                @elseif($orderList->state == 2)
                                        <p class="additional">구매확정</p>
                                @elseif($orderList->state == 3)
                                        <p class="additional"><a href="/product/detail/{{ $orderList->product_id }}">상품평</a></p>
                                @endif
                                </form>
                        @endforeach
                    </ul>
                    </form>
                </div>

                <div id="paging">
                    {{ $orderLists->withQueryString()->links() }}
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/admin4.js') }}"></script>
@endsection
