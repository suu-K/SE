@extends('layout')

@section('header')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <body>
        <form action="#" accept-charset="utf-8" method="POST" onkeydown="return captureReturnKey(event)">
            @csrf
        <div class="prod">
            <div id="product">
                <!-- 장바구니 쪽 head -->
                <div id="head_image">
                    이미지
                </div>
                <div id="head_name">
                    상품명
                </div>
                <div id="head_price">
                    개별가
                </div>
                <div id="head_amount">
                    수량
                </div>
                <div id="head_price">
                    상품금액
                </div>
                <div id="head_delete">삭제</div>

                <!-- 여기서부터 상품 추가 -->
                @foreach($carts as $product)
                <div id="image">
                    <img src="{{ url("storage/$product->image") }}">
                </div>
                <div id="name">{{ $product->name }}</div>
                <div id="price{{ $loop->iteration }}">{{ $product->sale_price }}</div>
                <div id="amount">
                    <input name="num" id="num{{ $loop->iteration }}" class="num" type="number" value="{{ $product->num }}" min="1" style="text-align:center;" onchange="sum();"/>
                </div>
                <div id="price"><div id="sumprice{{ $loop->iteration }}">{{ $product->sale_price * $product->num }}</div><nav>원</nav></div>
                <div id="delete"><button type="submit" value="삭제" formaction="">삭제</button></div>
                @endforeach

                <!-- 총 금액 -->
                <div class="sum">
                    총 금액
                </div>
                <div class="result"><div id="sum_price">7000</div><nav id="result">원</nav></div>

                <!-- 결제 버튼 -->
                <div class="buy">
                    <button value="">결제하기</button>
                </div>
            </div>
        </div>
        </form>
    </body>
@endsection

@section('footer')
    <script async src="{{ asset('js/cart.js') }}"></script>

    <script>
        function fnCalCount(type, ths){
            var $input = $(ths).parents("div").find("input[name='amount']");
            var tCount = Number($input.val());

            if(type=='p'){
            if(tCount) $input.val(Number(tCount)+1);

            }else{
            if(tCount >1) $input.val(Number(tCount)-1);
            }
        }

    @foreach($carts as $product)
    function sum()  {
        const name = document.getElementById('num{{ $loop->iteration }}').value;
        const price = $("#price{{ $loop->iteration }}").text();
        document.getElementById("sumprice{{ $loop->iteration }}").innerHTML = (name * price);
        this.price();
      }
    @endforeach

    function captureReturnKey(e) {
    if(e.keyCode==13 && SVGCircleElement.type != 'textarea')
    return false;
    }

  function price() {
    @foreach($carts as $product)
    const pr{{ $loop->iteration }} = $("#sumprice{{ $loop->iteration }}").text();
    @endforeach
    var sum = 0;
    @foreach($carts as $product)
    sum += pr{{ $loop->iteration }}*1;
    @endforeach
    document.getElementById('sum_price').innerHTML = sum;
  }
    </script>
@endsection
