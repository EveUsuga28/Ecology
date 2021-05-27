
@extends('layouts.app')

@section('css')

@endsection

@section('content')



</form>
@endsection

@section('js')
<script>

    $(document).ready(function(){
        $.ajax({
            url:'/informes/all',
            method:'post',
            data:{
                id:1,
                _token:$('input[name="_token"]').val()
            }
        }).done(function(res){
          alert(res);
        })
    })
</script>
@endsection
