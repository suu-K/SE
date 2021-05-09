@extends('admin.layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')

<form action="product/insert" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
    @csrf
    <ul class="stfForm">
        <li><input type=checkbox class="check" id="stf1" value="1"></li>
        <li>이름<input type="text" class="details1" name="name"></li>
        <li>상세<input type="text" class="details1" name="caption"/></li>
        <li>원가<input type="number" class="details1" name="price" style="width:100px;"/></li>
        <li>재고<input type="number" class="details1" name="num" style="width:60px;"/></li>
        <li>정가<input type="number" class="details1" name="sale_price"/></li>
        <li>카테<input type="text" class="details1" name="category"/></li>
        <li>사진<input type="file" class="details1" name="image" /></li>
        <li><button class="submit" formaction="/product/insert">등록</button></li>
    </ul>
</form>

    @endsection
