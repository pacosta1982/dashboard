@extends('layouts.master') 

@section('css')
<style>
        .border{
            border-color: black;
        }
           .imagencentro{
               
            margin-left: auto;
            margin-right: auto;
            display: block;
            max-width:100%;
            max-height:100%;
            margin-top: 50px;
           }    
           .center{
               text-align: center;
           }
        
           .total{
            font-weight: bold;
            
        }
        
        .titulo{
            margin-top: 20px;
            text-align: center;
            margin-bottom: -60px;
        }

        body {
            
            background-color: #a1b3d1;
        }
        
        </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
            <img src="{{asset('img/CASTELLANO-Y-GURANI-min-de-la-vivienda.png')}}" class="imagencentro" width="230" height="70">
    </div>
    <div class="col-md-4">
            <img src="{{asset('img/gobierno-nacional.png')}}" class="imagencentro"  width="250" height="60">
    </div>
    <div class="col-md-4">
            <img src="{{asset('img/slogan.png')}}" class="imagencentro" width="220" height="70">
    </div>
</div>


<div class="login-box">
    <h2 class="center"><strong>Tablero de Control</strong></h2>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Login') }}</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span> @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span> @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                <input type="checkbox"> Recuerdame
              </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection

