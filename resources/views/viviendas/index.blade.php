@extends('layouts.master')

@section('titulo')
<div class="col-sm-6">
        <h1>Mapa de Viviendas Administración Durand</h1>
</div>
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active">Mapa Viviendas</li>
    </ol>
</div>
@endsection


@section('content')



            <div class="card card-info card-outline">
              <div class="card-header card-info">
                <h3 class="card-title">
                    <h4>
                        <i class="fa fa-globe"></i> Mapa de Viviendas
                        
                      </h4>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div style="width: 100%; height: 600px;">
                            {!! Mapper::render() !!}
                        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


@endsection
