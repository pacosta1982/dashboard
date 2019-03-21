@extends('layouts.master')

@section('titulo')
<div class="col-sm-6">
        <h1>Proyectos</h1>
</div>
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active">Proyectos</li>
    </ol>
</div>
@endsection


@section('content')

<div class="card card-info card-outline">

    <div class="card-body">
            <form action="/filtros" method="post">
                {{ csrf_field() }}
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
                    <label for="exampleInputEmail1">Estado</label>
                    <select class="form-control required" name="estadoid" id="estadoid">
                        <option value="" >Seleccione una opción</option>
                        @foreach($estados as $est)

                        <option value="{{$est->value}}"
                         @if ($estadoid == $est->value)
                            selected="selected"
                          @endif
                            >{{$est->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Expediente</label>
                <input type="text" class="form-control" id="expnro" name="expnro" value="{{$expnro}}" placeholder="Ingrese Valor">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Buscar</button>
            </div>
        </div>
    </div>
</form>
<!-- /.card-body -->
</div>



    <div class="card">
            <div class="card-header">
              <h4 class="box-title">Proyectos Total: {{ $projects->total() }}</h4>
              <div class="pull-right">{{ $projects->appends(request()->except('_token'))->links() }}</div>  
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <th style="width: 10px">Exp.</th>
                  <th>Proyecto</th>
                  <th>Empresa/Sat</th>
                  <th>AMB</th>
                  <th>SOC</th>
                  <th>TEC</th>
                  <th>Total</th>
                  <th>Terreno</th>
                  <th>Distrito</th>
                  <th>Departamento</th>
                  <th>Estado</th>
                  
                  <th style="width: 40px">Avance</th>
                </tr>
                @foreach($projects as $project) 
                <tr>
                <td style="text-align:center;"><a href="{!! action('HomeController@showexp', ['id'=>$project->SEOBId,'NroExpS'=>$project->SEOBNroExpS,'idexp'=>$project->SEOBNroExp,'progid' => $progid
                        ,'dptoid' => $dptoid,'estadoid' => $estadoid,'page' => $page,'idtipo'=>'1','expnro' =>$expnro]) !!}">{{(substr($project->SEOBNroExp,0,-2)).'-'.(substr($project->SEOBNroExp,-2))}}</a></td>
                <td><a href="{!! action('HomeController@show', ['id'=>$project->SEOBId,'progid' => $progid
                        ,'dptoid' => $dptoid,'estadoid' => $estadoid,'page' => $page,'idtipo'=>'1','expnro' =>$expnro]) !!}">{{$project->SEOBProy}}</a></td>
                <td>{{$project->SEOBEmpr}}</td>
                <td style="text-align:center;">
                    @if($project->SEOBVTA == 'S')
                    <i class="fa fa-check" style="color:forestgreen"></i>
                    @else
                    <i class="fa fa-warning" style="color:darkorange"></i>
                    @endif
                </td>
                <td style="text-align:center;">
                    @if($project->SEOBInfS == 'S')
                    <i class="fa fa-check" style="color:forestgreen"></i>
                    @else
                    <i class="fa fa-warning" style="color:darkorange"></i>
                    @endif
                </td>
                <td style="text-align:center;">
                    @if($project->SEOBEvTe == 'S')
                    <i class="fa fa-check" style="color:forestgreen"></i>
                    @else
                    <i class="fa fa-warning" style="color:darkorange"></i>
                    @endif
                </td>
                <td style="text-align:center;">{{$project->SEOBViv}}</td>
                <td style="text-align:center;">{{$project->SEOBTerr}}</td>
                <td>{!! $project->CiuId?$project->distrito->CiuNom:"" !!}</td>
                <td>{!! $project->DptoId?$project->departamento->DptoNom:"" !!}</td>
                <td style="text-align:center;">{!! $project->SEOBEst !!}</td>

                <td style="text-align:center;">
                    @if ($project->SEOBFisAva >= 70)
                        <span class="badge bg-success">
                    @endif
                    @if ($project->SEOBFisAva <= 40)
                        <span class="badge bg-danger">
                    @endif
                    @if ($project->SEOBFisAva >= 41 && $project->SEOBFisAva <= 69)
                        <span class="badge bg-warning">
                    @endif
                        {{ number_format($project->SEOBFisAva,0,'.','.') }}%
                    </span>
                </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection

@section('javascript')
<!-- jQuery -->

@stop