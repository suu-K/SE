@extends('layout')

@section('header')
    <link href="{{asset('css/admin3.css')}}" rel="stylesheet" type="text/css" />
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

<form action="product/update" accept-charset="utf-8" enctype="multipart/form-data" method="POST">
    @csrf
<div class="second">
<div class="image">
    <div class="img1">
        <div class="display">
            <div class="event_banner">
                <ul class="slider">
                    @foreach($images as $image)
                    <li class="event"><img src="{{ url("storage/$image->url")}}"></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="img2">
        <input multiple="multiple" type=file name="image[]" accept="image/*" class="details1" id="imageUpload" disabled/>
    </div>
</div>
<div class="part">
    <div class="part1">
            <button class="details1" disabled  formaction="/product/update">저장</button>
            <button type="button" id="modify1">수정</button>
            <button type="submit" value="삭제" formaction="/product/delete">삭제</button>
            <input type="hidden" name="id" value="{{ $product->id }}">
    </div>

    <div class="part2">
        <div class="platform">
            <select name="platform" size="1"  class="details1" value="{{ $product->category }}" disabled>
                <option selected="selected" disabled>=선택=</option>
                <option value="PlayStation5">PlayStation5</option>
                <option value="PlayStation4">PlayStation4</option>
                <option value="PlayStationVR">PlayStationVR</option>
                <option value="PlayStation3">PlayStation3</option>
                <option value="닌텐도Switch">닌텐도Switch</option>
                <option value="닌텐도3DS">닌텐도3DS</option>
            </select>
        </div>

        <div class="name">
            <div class="a">
                이름
            </div>
            <div class="b">
            <input type="text" name="name" class="details1" value="{{ $product->name }}" autocomplete="off" required disabled>
            </div>
        </div>

        <div class="name">
            <div class="a">
                가격
            </div>
            <div class="b">
            <input type="text" name="price" class="details1" value="{{ $product->price }}" autocomplete="off" required disabled>
            </div>
        </div>

        <div class="name">
            <div class="a">
                재고량
            </div>
            <div class="b">
            <input type="text" name="num" class="details1" value="{{ $product->num }}" autocomplete="off" required disabled>
            </div>
        </div>

        <div class="name">
            <div class="a">
                판매가
            </div>
            <div class="b">
            <input type="text" name="sale_price" class="details1" value="{{ $product->sale_price }}" autocomplete="off" required disabled>
            </div>
        </div>

        <div class="name">
            <div class="a">
                상세 정보
            </div>
            <div class="b">
            <input type="text" name="caption" class="details1" value="{{ $product->caption }}" autocomplete="off" required disabled>
            </div>
        </div>
    </div>
</div>
</div>
</form>
    </div>
</div>
</div>

@endsection

@section('footer')
    <script src='{{ asset('js/admin3.js') }}'></script>
@endsection
