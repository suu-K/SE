@extends('admin.layout')

@section('header')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
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
                        <input type=date> ~ <input type=date>
                        <button>검색</button>
                        <button type="button" class="regist" onclick="location.href='/admin/insert'">등록/수정</button>
                    </div>
                </nav>
                </nav>
                <ul class="pageadmin">
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">dffffffddddfffffffffffffffffffffffffff
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">dffffffddddfffffffffffffffffffffffffff
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">dffffffddfffffffffffffffffffffff
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">dffffffddddfffffffffffffffffffffffff
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">d
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                    <li>
                        <form method="POST" style="display: flex;">
                            <span class="eventBody">
                                <input type=checkbox class="check" value="1">dffffffddddffffffffffffffffffgffffffffffffffffffffffffffffff
                            </span>
                            <span class="eventDel">
                                <button>삭제</button>
                            </span>
                        </form>
                    </li>
                </ul>
                <nav class="paging"></nav>
            </div>

            <div class="test">
                <form class="find" action="#">
                    <div style="padding-bottom:10px;">
                        <div>
                            <ul style="display: flex;">
                                <li>이름</li>
                                <li style="padding-left: 280px;">가격대</li>
                                <li style="padding-left:330px;">정렬</li>
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
                            <li style="margin-left: 140px;">
                                <select name="Order" >
                                    <option value="none">=== 선택 ===</option>
                                    <option value="smaller">낮은가격순</option>
                                    <option value="larger">높은가격순</option>
                                    <option value="nameOrder">이름순</option>
                                </select>
                            </li>
                            <li style="margin-left: 20px;">
                                <button>검색</button>
                            </li>
                            <li style="margin-left: 20px;">
                                <button type="button" onclick="location.href='/product/insert'">등록</button>
                            </li>
                        </ul>
                    </div>
                </form>

                <ul class="pageadmin">
                    <li>
                        <ul id="attribute">
                            <li style="margin-left:10px;">클릭</li>
                            <li style="margin-left:50px;">이미지</li>
                            <li style="margin-left:27px;">이름</li>
                            <li style="margin-left:86px">카테고리</li>
                            <li style="margin-left:8px;">상세정보</li>
                            <li style="margin-left:95px;">가격</li>
                            <li style="margin-left:68px;">재고량</li>
                            <li style="margin-left:10px;">판매가</li>
                        </ul>
                    </li>
                    @foreach($products as $product)
                    <li>
                        <form action="product/update" accept-charset="utf-8" class="stfDiv" enctype="multipart/form-data" method="POST">
                            @csrf
                            <li><a href="#" class="stfName">{{ $product->name }}</a></li>
                            <ul class="stfForm">
                                <li class="toggle"><input type=file name="image" accept="image/*" class="details1" id="imageUpload"  style="width:75px;" disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="name" value="{{ $product->name }}" style="width:120px;" required disabled></li>
                                <li class="toggle">
                                    <select name="platform" size="1"  class="details1" style="width:70px" disabled>
                                        <option selected="selected">=선택=</option>
                                        <option value="PlayStation5">PlayStation5</option>
                                        <option value="PlayStation4">PlayStation4</option>
                                        <option value="PlayStationVR">PlayStationVR</option>
                                        <option value="PlayStation3">PlayStation3</option>
                                        <option value="닌텐도Switch">닌텐도Switch</option>
                                        <option value="닌텐도3DS">닌텐도3DS</option>
                                    </select>
                                </li>
                                <li class="toggle"><input type="text" class="details1" name="caption" value="{{ $product->caption }}" required disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="price" value="{{ $product->price }}" style="width:100px;" required disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="num" value="{{ $product->num }}" style="width:60px;" required disabled/></li>
                                <li class="toggle"><input type="text" class="details1" name="sale_price" value="{{ $product->sale_price }}" style="width:100px;" required disabled/></li>
                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                <li class="toggle"><button class="details1" disable formaction="/product/update">저장</button></li>
                                <li class="toggle"><button type="button" id="modify1">수정</button></li>
                                <li class="toggle"><button type="submit" value="삭제" formaction="/product/delete">삭제</button></li>
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
