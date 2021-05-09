@extends('admin.layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/admin.css') }}"/>
@endsection

@section('content')

    <div class="ctrMenu">
        <aside class="tab">
            <ul>
                <li class="active"><a href="#">공지/이벤트 관리</a></li>
                <li><a href="#">상품관리</a></li>
            </ul>
        </aside>
        <div class="ctr">
            <div class="active test" id="event" action="#" method="POST">
                <nav class="range" style="padding-top:50px; margin-left: 30px;">
                    <div style="padding-bottom:30px;">
                        <button id="del">삭제</button>
                        <input type=date> ~ <input type=date>
                        <button>검색</button>
                    </div>
                </nav>
                </nav>
                <ul class="pageadmin">
                    <li><input type=checkbox class="check" value="1">dfffffffffffffffffffffffffffffffff</li>
                    <li><input type=checkbox class="check" value="1">dsssssssssssssssssssssssssssss</li>
                    <li><input type=checkbox class="check" value="1">daaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
                    <li><input type=checkbox class="check" value="1">dgggggggggggggggggggggggggggggggggggggggggggggggfff g</li>
                    <li><input type=checkbox class="check" value="1">dhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</li>
                </ul>
                <nav class="paging"></nav>
            </div>

            <div id="stuff" action="#" method="POST" class="test">

                <!-- 검색 UI -->
                <form class="find" action="#">
                    <div style="padding-bottom:10px;">
                        <div>
                            <ul style="display: flex;">
                                <li>이름</li>
                                <li style="padding-left: 280px;">가격대</li>
                                <li style="padding-left:380px;">정렬</li>
                            </ul>
                        </div>
                        <ul style="display: flex;">
                            <li style="margin-right: 150px;">
                                <input type="text">
                            </li>
                            <li>
                                <select name="minimum" >
                                    <option value="none">=== 선택 ===</option>
                                    <option value="0">0</option>
                                    <option value="10000">10000</option>
                                    <option value="30000">30000</option>
                                    <option value="50000">50000</option>
                                </select>
                            </li>
                            <li style="padding-left: 10px; padding-right: 10px;">~</li>
                            <li>
                                <select name="maximum" >
                                    <option value="none">=== 선택 ===</option>
                                    <option value="0-1">0</option>
                                    <option value="10000-1">10000</option>
                                    <option value="300000-1">30000</option>
                                    <option value="50000-1">50000</option>
                                </select>
                            </li>
                            <li style="margin-left: 190px;">
                                <select name="Order" >
                                    <option value="none">=== 선택 ===</option>
                                    <option value="smaller">낮은가격순</option>
                                    <option value="larger">높은가격순</option>
                                    <option value="nameOrder">이름순</option>
                                </select>
                            </li>
                            <li style="padding-left: 20px;">
                                <button>검색</button>
                            </li>

                        </ul>
                    </div>
                </form>

                <ul class="pageadmin">
                    <li>
                        <ul id="attribute">
                            <li style="margin-left:37px;">클릭</li>
                            <li style="margin-left:71px;">이름</li>
                            <li style="margin-left:128px;">상세정보</li>
                            <li style="margin-left:100px;">가격</li>
                            <li style="margin-left:65px;">재고량</li>
                            <li style="margin-left:10px;">판매가</li>
                        </ul>
                    </li>
                     <!-- 상품 수정 UI -->
                     @foreach($products as $product)
                    <li>
                        <form action="product/update" accept-charset="utf-8" method="POST">
                            @csrf
                            <ul class="stfForm">
                                <li><input type=checkbox class="check" id="stf1" value="1"></li>
                                <li><a href="#" class="stfName">{{ $product->name }}</a></li>
                                <li class="toggle"><input type="text" class="details1" name="name" value="{{ $product->name }}" disabled></li>
                                <li class="toggle"><input type="text" class="details1" name="caption" value="{{ $product->caption }}" disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="price" value="{{ $product->price }}" style="width:100px;" disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="num" value="{{ $product->num }}" style="width:60px;" disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="sale_price" value="{{ $product->sale_price }}" disabled/></li>
                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                <li class="toggle"><button class="submit" formaction="/product/update">저장</button></li>
                                <li class="toggle"><button type="button" id="modify1">수정</button></li>
                                <li class="toggle"><button type="submit" value="delete" formaction="/product/delete">삭제</button></li>
                            </ul>
                        </form>
                    </li>
                    @endforeach
                </ul>
                <nav class="paging"></nav>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('js/admin.js')}}"></script>
@endsection
