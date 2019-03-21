@extends('layouts.master')

@section('titulo')
<div class="col-sm-6">
        <h1>Resumen Proyecto</h1>
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
        <li class="breadcrumb-item active">{{substr($project->SEOBProy,0,50) }}</li>
    </ol>
</div>
@endsection

@section('content')

  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
              <h4>
                  <i class="fa fa-globe"></i> {{$project->SEOBProy }}
                  <small class="float-right">Date: 2/10/2014</small>
                </h4>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <dl class="dl-horizontal">
                    SAT: {{$project->SEOBEmpr}}<br>
                    Departamento: {!! $project->DptoId?$project->departamento->DptoNom:"" !!}<br>
                    Distrito: {!! $project->CiuId?$project->distrito->CiuNom:"" !!}<br>
                    Expediente: <a href="{!! action('HomeController@showexp', ['id'=>$project->SEOBId,'NroExpS'=>$project->SEOBNroExpS,'idexp'=>$project->SEOBNroExp,'progid' => $progid
                        ,'dptoid' => $dptoid,'estadoid' => $estadoid,'page' => $page,'idtipo'=>'1']) !!}">{{(substr($project->SEOBNroExp,0,-2)).'-'.(substr($project->SEOBNroExp,-2))}}</a><br>
                    Estado: {!! $project->SEOBEst !!}<br>
                    Total Casas: {{$project->SEOBViv}}<br>
                    Total Avance: {!! number_format($project->SEOBFisAva,0,'.','.')  !!}%<br>
                    Avance: <div class="progress progress-lg" >
                              @if ($project->SEOBFisAva >= 70)
                              <div class="progress-bar bg-success" style="width: {{ $project->SEOBFisAva}}% "></div>
                              @endif

                              @if ($project->SEOBFisAva <= 40)
                              <div class="progress-bar bg-danger" style="width: {{ $project->SEOBFisAva}}%"></div>
                              @endif

                              @if ($project->SEOBFisAva >= 41 && $project->SEOBFisAva <= 69)
                              <div class="progress-bar bg-warning" style="width: {{ $project->SEOBFisAva}}%"></div>
                              @endif
                            </div>
                </dl>
              </div>
              <div class="col-sm-8">
                  {!! Mapper::render() !!}
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
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Observaciones</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Observaciones Fonavis</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              @include('projects.tabs.observaciones')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              @if($project->SEOBPtoNro)
                @include('projects.tabs.observacionesfonavis')
              @endif

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