@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">報名功能測試</div>

                <div class="panel-body">
                   <table>
                       <thead>
                           <th>編號</th>
                       </thead>
                       <tbody>
                           <td>{{$register->id}}</td>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var vm = new Vue({
        el: "#regist_form",
        data: {
            creater_count: 1
        }
    });
</script>
@endsection
