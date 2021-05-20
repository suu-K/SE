@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/enrollment.css') }}"/>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form autocomplete="off" action="/product/insert" enctype="multipart/form-data" method="POST">
        @csrf
                <div class="prod">
                    <div class="product">
                        <div class="name">
                            <div id="a">카테고리</div>
                            <div id="b">
                                <select name="category">
                                    <option selected="selected">선택</option>
                                    <option value="PlayStation5">PlayStation5</option>
                                    <option value="PlayStation4">PlayStation4</option>
                                    <option value="PlayStationVR">PlayStationVR</option>
                                    <option value="PlayStation3">PlayStation3</option>
                                    <option value="닌텐도Switch">닌텐도Switch</option>
                                    <option value="닌텐도3DS">닌텐도3DS</option>
                                </select>
                            </div>
                        </div>

                        <div class="name">
                            <div id="a">상품명</div>
                            <div id="b"><input type="text" id="prod_name" name="name" placeholder="상품명" onfocus="this.placeholder=''" onblur="this.placeholder='상품명'" required></div>
                        </div>

                        <div class="name">
                            <div id="a">원가</div>
                            <div id="b">
                                <input type="text" pattern="[0-9]+" oninvalid="alert('원가: 숫자만 입력하세요');" id="" name="price" placeholder="원" onfocus="this.placeholder=''" onblur="this.placeholder='원'" required>
                            </div>
                        </div>

                        <div class="name">
                            <div id="a">할인가</div>
                            <div id="b">
                                <input type="text" pattern="[0-9]+" oninvalid="alert('할인가: 숫자만 입력하세요');" id="" name="sale_price" placeholder="원" onfocus="this.placeholder=''" onblur="this.placeholder='원'" required>
                            </div>
                        </div>

                        <div class="name">
                            <div id="a">재고량</div>
                            <div id="b">
                                <input type="text" pattern="[0-9]+" oninvalid="alert('재고량: 숫자만 입력하세요');" name="num" placeholder="개" onfocus="this.placeholder=''" onblur="this.placeholder='개'" required>
                            </div>
                        </div>

                        <div class="name">
                            <div id="a">상품 정보</div>
                            <div id="b">
                                <textarea placeholder="상품 정보" name="caption" onfocus="this.placeholder=''" onblur="this.placeholder='상품 정보'" required></textarea>
                            </div>
                        </div>

                        <div class="name">
                            <div id="a">이미지 등록</div>
                            <div id="b">
                                <input multiple="multiple" type="file" name="images[]" size=40 required>
                            </div>
                        </div>

                        <div id="keep">
                            <button>상품 등록</button>
                        </div>
                    </div>
            </div>
    </form>
@endsection

@section('footer')
    <script src="{{asset('js/admin.js')}}"></script>
@endsection
