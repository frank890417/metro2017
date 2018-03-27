@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">報名功能測試</div>

                <div class="panel-body">
                   <table class='table table-hover' id=posttable>
                       <thead>
                           <th>編號</th>
                           <th>主創作者</th>
                           <th>選擇站體</th>
                           <th>作品名稱</th>
                           <!-- <th>同意書檔案</th> -->
                           {{-- <th>作品檔案</th> --}}
                           <th>上傳時間</th>
                           <th>詳細資料</th>
                       </thead>
                       <tbody>
                           @foreach ($registers as $reg)
                               <tr>
                                  <td> {{ $reg->id }} </td>
                                  <td> {{ $reg->name }} </td>
                                  <td> {{ $reg->station_name }} </td>
                                  <td> {{ $reg->workname }} </td>
                                  {{-- <td> <audio controls> <source src="{{ url('/registwork/file/'.$reg->work_file) }}" type=""></audio> </td> --}}
                                  <td> {{ $reg->created_at }} </td>
                                  <td> <a href="{{ url('/registwork/manage/'.$reg->id) }}" class="btn btn-default">詳細資料</a> </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">下載方式:</div>
                <div class="panel-body">
                    <h5>1.在上方表單右鍵另存檔案單獨下載</h5>
                    <h5>2.或大量下載使用<a href="https://filezilla-project.org/download.php?type=client" target="_blank">Filezilla</a> 設定如下:</h5>
                    <ul>
                        <li>主機名稱: taipeisoundscape.com</li>
                        <li>協定: SFTP</li>
                        <li>使用者: taipeisoundscape</li>
                        <li>密碼: 0912028693</li>
                    </ul>
                    <img src="http://i.imgur.com/d0ZYPw1.png" alt="" style='width: 100%;max-width: 500px;'>
                    <h5>進去之後即可看到以參賽者ID+名字命名的資料夾</h5>
                    <img src="http://i.imgur.com/H904RJV.png" alt="" style='width: 100%;max-width: 500px;'>
                    <p>直接指定本地左邊資料夾，全選作品資料夾按右鍵下載即可</p>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

@endsection
@section("require_js_after")
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>

    var vm = new Vue({
        el: "#regist_form",
        data: {
            creater_count: 1
        }
    });


    window.onload=function(){
      if ($('#posttable').length>0){
        $('#posttable').DataTable();
      }
    }
</script>
@endsection
