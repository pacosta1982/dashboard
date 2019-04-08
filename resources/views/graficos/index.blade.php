@extends('layouts.master')

@section('titulo')
<div class="col-sm-6">
        <h1>Estados de Proyectos</h1>
</div>
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active">Graficos</li>
    </ol>
</div>
@endsection


@section('content')

<div class="card card-info card-outline">

        <div class="card-body">
                <form action="/filtrosgraficos" method="post">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Programa</label>
                        <select class="form-control required" name="progid" id="user_id">
                            <option value="" >Seleccione una opción</option>
                            @foreach($programas as $us)
    
                            <option value="{{$us->value}}"
                             @if ($progid == $us->value)
                                selected="selected"
                              @endif
                                >{{$us->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Departamento</label>
                        <select class="form-control required" name="dptoid" id="dptoid">
                            <option value="" >Seleccione una opción</option>
                            @foreach($departamentos as $dpt)
    
                            <option value="{{$dpt->DptoId}}"
                             @if ($dptoid == $dpt->DptoId)
                                selected="selected"
                              @endif
                                >{{$dpt->DptoNom}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                        <div class="form-group">
                                <label>Meta</label>
                                <select class="form-control required" name="metaid" id="metaid">
                                    <option value="" >Seleccione una opción</option>
                                    @foreach($metas as $met)
            
                                    <option value="{{$met->value}}"
                                     @if ($metaid == $met->value)
                                        selected="selected"
                                      @endif
                                        >{{$met->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                   <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Expediente</label>
                    <input type="text" class="form-control" id="expnro" name="expnro" value="{{$expnro}}" placeholder="Ingrese N° de Expediente">
                    </div> -->
                    
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Administración</label>
                            <select class="form-control required" name="adminid" id="adminid">
                                <option value="" >Seleccione una opción</option>
                                @foreach($administracion as $adm)
        
                                <option value="{{$adm->value}}"
                                 @if ($adminid == $adm->value)
                                    selected="selected"
                                  @endif
                                    >{{$adm->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Buscar</button> 
                    </div>
            </div>
            
        </div>
    </form>
    <!-- /.card-body -->
    </div>
    
    <div class="row">
            <div class="col-md-6">
              <div class="card card-info card-outline">
                <div class="card-header">
                        
                  <h3 class="card-title"><i class="fa fa-bar-chart"></i> Estado de Proyectos</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        {!! $chartjs_presupuestotorta->render() !!}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-bar-chart"></i> Avance de Proyectos</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        {!! $chartjs_tortaavance->render() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

          </div>

    <div class="row">
            <div class="col-md-12">
              <div class="card card-info card-outline">
                <div class="card-header">
                        
                  <h3 class="card-title"><i class="fa fa-bar-chart"></i> Viviendas por Departamento</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        {!! $chartjs_resumeneje->render() !!}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

          </div>

@endsection