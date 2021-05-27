@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="">{{ __('Dashboard') }}</div>

                <div class="">

                    {{ __('Estas logeado!') }}
                </div>
            </div>
            <div class="card-body">
              <a href="{{route('informes.index')}}" class="nav-link active">
              <p>Informes</p>
              </a>
            </div>
        </div>
    </div>
</div>

@endsection
