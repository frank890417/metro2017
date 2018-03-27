@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">報名功能測試</div>

                <div class="panel-body">
                    <form action="{{ url('/registwork') }}"  enctype="multipart/form-data" method="post" id="regist_form">
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <Registform></Registform>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('blade_pass_variables')
<script>
    window.data_storage.stations= JSON.parse('{{ json_encode($stations) }}'.
    replace(/[\n]/g, '\\n').replace(/&quot;/g,"\""));
    window.data_storage.countrydata = '{{ config("constants.country_list") }}';
</script>
@endsection