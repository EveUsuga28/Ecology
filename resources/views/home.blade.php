@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estas logeado!') }}
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('users.index')}}" class="nav-link active"> 
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
            </div>
            
        </div>
    </div>
</div>
@endsection