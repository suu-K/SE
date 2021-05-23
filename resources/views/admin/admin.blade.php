@extends('layout')

@section('header')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="ctrMenu">
        <aside class="tab">
            <ul>
                <li class="active"><a href="/admin">공지/이벤트 관리</a></li>
                <li><a href="/admin2">상품관리</a></li>
            </ul>
        </aside>
        <div class="ctr">
            <div class="test" id="event" action="#" method="POST">
                <nav class="range" style="padding-top:50px; margin-left: 30px;">
                    <div style="padding-bottom:30px;">
                        <form method="GET">
                        <input type=date name="sdate" value="{{ session()->pull('sdate') }}"> ~ <input type=date name="ldate" value="{{ session()->pull('ldate') }}">
                        <select name="order">
                            <option value="none">=== 정렬 ===</option>
                            <option value="asc" @if(session()->get('order') == 'asc') selected @endif>낮은가격순</option>
                            <option value="desc" @if(session()->get('order') == 'desc') selected @endif>높은가격순</option>
                        </select>
                        <button formaction="/admin">검색</button>
                        <button type="button" class="regist" onclick="location.href='/admin/event'">등록/수정</button>
                        </form>
                    </div>
                </nav>
                </nav>
                <ul class="pageadmin">

                    @foreach($events as $event)
                    <li>
                        <form method="POST" style="display: flex;" action="/event/delete">
                            @csrf
                            <span class="eventBody">
                                <input type=checkbox class="check" value="{{ $event->id }}">{{ $event->title }}
                                <input type=hidden name="id" value="{{ $event->id }}">
                            </span>
                            <span class="eventDel">
                                @if($event->deleted_at == null)
                                <button formaction="/event/softDelete">비활성화</button>
                                @else
                                <button formaction="/event/restore">활성화</button>
                                @endif
                                <button formaction="/event/delete">삭제</button>
                            </span>
                        </form>
                    </li>
                    @endforeach

                </ul>
                <nav class="paging">{{ $events->withQueryString()->links() }}</nav>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="admin.js"></script>
@endsection
