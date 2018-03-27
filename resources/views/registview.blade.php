@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('registwork/manage/') }}">< 返回列表</a>
                </li>
                <li class="active">報名資料檢視</li>
            </ol>
            @if (Auth::guest())
                <h2>請先登入以瀏覽資料
            @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>報名編號-{{$regist->id}} -{{$regist->workname}} 詳細資料</h3>
                         <div class="row">
                            <div class="col-sm-5">
                                <h4>創作者({{ $regist->creator_count }}人)</h4>
                                <hr>
                                @foreach ($creators as $id=>$creator)
                                    @if($creator->rank==1)
                                        <h5>主要創作者1</h5>
                                    @else
                                        <h5>共同創作者{{$creator->rank}}</h5>
                                    @endif
                                    <table class='table table-bordered'>
                                        <tbody>
                                            <tr>
                                                <td style='width: 150px'><b>姓名</b></td>
                                                <td>{{ $creator->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>國籍</b></td>
                                                <td>{{ $creator->country }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>手機</b></td>
                                                <td>{{ $creator->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>信箱</b></td>
                                                <td>{{ $creator->mail }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>是否滿18</b></td>
                                                <td>{{ $creator->is_eighteen?'是':'否' }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>同意書</b></td>
                                                <td><a href="{{ url('/registwork/file/'.$creator->agreement_file) }}" class="btn btn-primary btn-sm" target="_blank">下載</a></td>
                                            </tr>
                                            @if (!($creator->is_eighteen))
                                                <tr>
                                                    <td><b>法定代理人同意書</b></td>
                                                    <td>       
                                                        <a href="{{ url('/registwork/file/'.$creator->under_eighteen_file) }}" class="btn btn-primary btn-sm" target="_blank"> 下載 </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            
                                        </div>
                                       
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        
                        <div class="col-sm-7">

                            <h4>作品說明</h4>
                            <hr>
                            <h5>標題: </h5>
                            <p>{{ $regist->workname }}</p>
                            <h5>選擇站體:</h5>
                            <p>{{ $station->name_cht }}</p>
                            <h5>說明:</h5>
                            <p>{{ $regist->description }}</p>
                            <h5>作品檔案</h5>
                            <audio controls> <source src="{{ url('/registwork/file/'.$regist->work_file) }}" type=""></audio>
      <!--                       <h5>報名時間</h5>
                            <p> {{$regist->created_at}}</p> -->
                            
                        </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
