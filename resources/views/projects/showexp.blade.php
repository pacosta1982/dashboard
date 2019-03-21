@extends('layouts.master')

@section('titulo')
<div class="col-sm-6">
        <h1>Detalle Expediente</h1>
</div>
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item">
          <a href="{!! action('HomeController@index', ['progid' => $progid,'dptoid' => $dptoid,'estadoid' => $estadoid,'page' => $page,'idtipo'=>'1']) !!}">
            Proyectos
          </a>
        </li>
        <li class="breadcrumb-item active">Exp</li>
    </ol>
</div>
@endsection

@section('content')

  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
              <h4>
                  <i class="fa fa-globe"></i> Expediente N° {{(substr($expediente->NroExp,0,-2)).'-'.(substr($expediente->NroExp,-2))}} Serie: {!! $expediente->NroExpS !!}
                  <small class="float-right">Fecha de Solicitud: {!! date('d/m/Y H:i', strtotime($expediente->NroExpFch)) !!}</small>
                </h4>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
              <div class="col-sm-8">
                <dl class="dl-horizontal">
                    Solicitante: {!! $expediente->NroExpsol !!}<br>
                    Solicitud: {!! $expediente->NroExpCon !!}<br>
                    
                </dl>
              </div>
              <div class="col-sm-4">
                  <dl class="dl-horizontal">
                      Recibido por: {!! $expediente->NUsuNombre !!}<br>
                      Tipo Expediente: {!! $expediente->TexCod?$expediente->tiposol->TexDes:"" !!}<br>
                      
                      
                  </dl>
                </div>
              <div class="col-sm-8">
                  
              </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  <div class="col-md-12">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Historial Expediente</a></li>
            <!--   <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Observaciones Fonavis</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
                @include('projects.tabs.historial')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">


            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>

@endsection

@section('javascript')
<!-- jQuery -->

@stop