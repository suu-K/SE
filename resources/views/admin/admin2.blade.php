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
            </ul>
        </aside>
        <div class="ctr">


            <div class="test">
                <form class="find" action="/admin/productSearch">
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
                            <li style="margin-right: 150px;">
                                <input type="text" name="name" value="{{ session()->pull('name') }}">
                            </li>
                            <li>
                                <input type="number" name="min" value="{{ session()->pull('min') }}">
                            </li>
                            <li style="padding-left: 10px; padding-right: 10px;">~</li>
                            <li>
                                <input type="number" name="max" value="{{ session()->pull('max') }}">
                            </li>
                            <li style="margin-left: 140px;">
                                <select name="order" >
                                    <option value="none">=== 선택 ===</option>
                                    <option value="asc">낮은가격순</option>
                                    <option value="desc">높은가격순</option>
                                    <option value="nameOrder">이름순</option>
                                </select>
                            </li>
                            <li style="margin-left: 20px;">
                                <button formaction="/admin/productSearch">검색</button>
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
                            <li>이미지</li>
                            <li style="margin-left:27px;">이름</li>
                            <li style="margin-left:130px">카테고리</li>
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
                            <a href="#" class="stfName">{{ $product->name }}</a>
                            <ul class="stfForm">
                                <li class="toggle"><input type=file name="image" accept="image/*" class="details{{ $loop->iteration }}" id="imageUpload"  style="width:75px;" disabled/></li>
                                <li class="toggle"><input type="text" class="details{{ $loop->iteration }}" name="name" value="{{ $product->name }}" style="width:120px;" required disabled></li>
                                <li class="toggle">
                                    <select name="platform" size="1"  class="details{{ $loop->iteration }}" value="{{ $product->category }}" style="width:70px" disabled>
                                        <option selected="selected">=선택=</option>
                                        <option value="PlayStation5">PlayStation5</option>
                                        <option value="PlayStation4">PlayStation4</option>
                                        <option value="PlayStationVR">PlayStationVR</option>
                                        <option value="PlayStation3">PlayStation3</option>
                                        <option value="닌텐도Switch">닌텐도Switch</option>
                                        <option value="닌텐도3DS">닌텐도3DS</option>
                                    </select>
                                </li>
                                <li class="toggle"><input type="text" class="details{{ $loop->iteration }}" name="caption" value="{{ $product->caption }}" required disabled/></li>
                                <li class="toggle"><input type="text" class="details{{ $loop->iteration }}" name="price" value="{{ $product->price }}" style="width:100px;" required disabled/></li>
                                <li class="toggle"><input type="text" class="details{{ $loop->iteration }}" name="num" value="{{ $product->num }}" style="width:60px;" required disabled/></li>
                                <li class="toggle"><input type="text" class="details{{ $loop->iteration }}" name="sale_price" value="{{ $product->sale_price }}" style="width:100px;" required disabled/></li>
                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                <li class="toggle"><button class="details{{ $loop->iteration }}" disable formaction="/product/update">저장</button></li>
                                <li class="toggle"><button type="button" id="modify{{ $loop->iteration }}">수정</button></li>
                                <li class="toggle"><button type="submit" value="삭제" formaction="/product/delete">삭제</button></li>
                            </ul>
                        </form>
                    </li>
                    @endforeach

                </ul>
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('js/admin2.js')}}"></script>
@endsection
