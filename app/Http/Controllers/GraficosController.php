<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Observacion;
use App\ObservacionFonavis;
use App\Programa;
use App\Departamento;
use App\Administracion;
use App\Estado;
use App\SIG005;
use App\SIG006;
use App\Meta;
use Mapper;

class GraficosController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //$projects = Project::paginate(10);
        $programas = Programa::all();
        $departamentos = Departamento::all();
        $estados = Estado::all();
        $projects = Project::query();
        $iniciado = Project::query();
        $noiniciado = Project::query();
        $paralizado = Project::query();

        $avancebueno = Project::query();
        $avancemedio = Project::query();
        $avancemalo = Project::query();

        $casas = Project::query();
        //$user_info = $user_info->selectRaw('DptoId, (SUM(2) as total'))
        //$user_info = $user_info->groupBy('DptoId')
        //->get();
        /*$user_info = Project::groupBy('DptoId')
        //->select('DptoId', \DB::raw('SUM(2) as total'))
        ->selectRaw('sum(SEOBViv) as sum, DptoId')
        ->pluck('sum','users_editor_id');
        //->whereNotIn('DptoId',[0])
        //->orderBy('DptoId')
        //->get();
        dd($user_info);
        $arr = [];
        foreach ($user_info as $key => $value) {
            array_push($arr,$value->sum);
           
            //$planif+=$value->TabGer01VivPla;
        }*/

        //array_pop($arr);
        //dd($arr);
        $metas = Meta::all();
        $administracion = Administracion::all();

        

        if ($request->input('progid')) {
            $projects = $projects->where('SEOBProgr', $request->input('progid'));
            $iniciado = $iniciado->where('SEOBProgr', $request->input('progid'));
            $noiniciado = $noiniciado->where('SEOBProgr', $request->input('progid'));
            $paralizado = $paralizado->where('SEOBProgr', $request->input('progid'));
            //var_dump($iniciado);
            $avancebueno = $avancebueno->where('SEOBProgr', $request->input('progid'));
            $avancemedio = $avancemedio->where('SEOBProgr', $request->input('progid'));
            $avancemalo = $avancemalo->where('SEOBProgr', $request->input('progid'));

            $casas = $casas->where('SEOBProgr', $request->input('progid'));
        }

        if ($request->input('dptoid')) {
            $projects = $projects->where('DptoId', $request->input('dptoid'));
            $iniciado = $iniciado->where('DptoId', $request->input('dptoid'));
            $noiniciado = $noiniciado->where('DptoId', $request->input('dptoid'));
            $paralizado = $paralizado->where('DptoId', $request->input('dptoid'));

            $avancebueno = $avancebueno->where('DptoId', $request->input('dptoid'));
            $avancemedio = $avancemedio->where('DptoId', $request->input('dptoid'));
            $avancemalo = $avancemalo->where('DptoId', $request->input('dptoid'));

            //$casas = $casas->where('DptoId', $request->input('DptoId'));
        }


        if ($request->input('adminid')) {

            $projects = $projects->where('SEOBAdmin', $request->input('adminid'));
            $iniciado = $iniciado->where('SEOBAdmin', $request->input('adminid'));
            $noiniciado = $noiniciado->where('SEOBAdmin', $request->input('adminid'));
            $paralizado = $paralizado->where('SEOBAdmin', $request->input('adminid'));

            $avancebueno = $avancebueno->where('SEOBAdmin', $request->input('adminid'));
            $avancemedio = $avancemedio->where('SEOBAdmin', $request->input('adminid'));
            $avancemalo = $avancemalo->where('SEOBAdmin', $request->input('adminid'));

            //$casas = $casas->where('SEOBAdmin', $request->input('SEOBAdmin'));

        }

        if ($request->input('metaid')) {

            $projects = $projects->where('SEOBPlan', $request->input('metaid'));
            $iniciado = $iniciado->where('SEOBPlan', $request->input('metaid'));
            $noiniciado = $noiniciado->where('SEOBPlan', $request->input('metaid'));
            $paralizado = $paralizado->where('SEOBPlan', $request->input('metaid'));

            $avancebueno = $avancebueno->where('SEOBPlan', $request->input('metaid'));
            $avancemedio = $avancemedio->where('SEOBPlan', $request->input('metaid'));
            $avancemalo = $avancemalo->where('SEOBPlan', $request->input('metaid'));
            //$casas = $casas->where('SEOBPlan', $request->input('SEOBPlan'));

        }

        $casas = $casas->select('DptoId', \DB::raw('SUM("SEOBViv") as total'));
        //$casas = $casas->select('DptoId', \DB::raw('SUM(2) as total'))
        $casas = $casas->whereNotIn('DptoId',[0]);
        $casas = $casas->groupBy('DptoId');
        $casas = $casas->whereNotIn('DptoId',[0]);
        $casas = $casas->orderBy('DptoId', 'asc')->get();

        $arr = [];
        $dto = [];
        foreach ($casas as $key => $value) {
            array_push($arr,$value->total);
            array_push($dto,utf8_encode(rtrim($value->DptoId?$value->departamento->DptoNom:"")));
           
            //$planif+=$value->TabGer01VivPla;
        }

        array_pop($arr);
        array_pop($dto);
        //->get();



        //$casas = $casas->groupBy('DptoId')
        //->get();
        //dd($casas)
        //$casas = $casas->groupBy('DptoId')->toArray();
        //$casas = $casas->get();
        //dd($dto);
        $iniciado = $iniciado->where('SEOBEst','=', 'E')->count();
        $noiniciado = $noiniciado->where('SEOBEst','=', 'I')->count();
        $paralizado = $paralizado->where('SEOBEst','=', 'P')->count();

        

        //$avancebueno = $projects;
        //$avancemedio = $projects;
        //$avancemalo = $projects;

        $avancebueno = $avancebueno->where('SEOBFisAva','>=', 71)->count();
        $avancemedio = $avancemedio->where('SEOBFisAva','>=', 31);
        $avancemedio = $avancemedio->where('SEOBFisAva','<=', 70);
        $avancemedio = $avancemedio->count();
        $avancemalo = $avancemalo->where('SEOBFisAva','<=', 30)->count();

        $projects = $projects->paginate(5000);


        $progid=$request->input('progid');
        $dptoid=$request->input('dptoid');
        $estadoid=$request->input('estadoid');
        $page=$request->input('page');
        $expnro=$request->input('expnro'); 
        $proyname=$request->input('proyname');
        $satname=$request->input('satname');
        $adminid=$request->input('adminid');
        $metaid=$request->input('metaid');
        $porcentajeid=$request->input('porcentajeid');


        

        //->marker(-23.442503, -58.4438324);

        $chartjs_resumeneje = app()->chartjs
        ->name('resumen')
        ->type('bar')
        //->size(['width' => 400, 'height' => 200])
        /*->labels(['CONCEPCION', 'SAN PEDRO', 'CORDILLERA', 'GUAIRA', 'CAAGUAZU', 'CAAZAPA', 'ITAPUA', 
        'MISIONES', 'PARAGUARI', 'ALTO PARANA', 'CENTRAL', 'ÑEEMBUCU', 'AMAMBAY', 'CANINDEYU', 'PTE. HAYES'
        , 'BOQUERON', 'ALTO PARAGUAY'])*/

        ->labels($dto)
        ->datasets([
            [
                "label" => "Viviendas",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $arr,//$arr,
            ],

        ])
        //->options([]);
        ->optionsRaw("{
            legend: {
                display:true,
                position: 'bottom',
                labels: {
                    fontColor:  '#000'
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    }  
                }],
                yAxes: [{
                    gridLines: {
                        display:true
                    }  
                }]
            },
            plugins: {
                labels: {
                    render: 'value'
                },
            }
        }");

        //$obligado= number_format(($tabger02->sum('TabGer02Oblig') * 100) / $tabger02->sum('TabGer02PlanFin'),0,'.','.');
        //$plafin  = number_format((100 - ($tabger02->sum('TabGer02Oblig') * 100) / $tabger02->sum('TabGer02PlanFin')),0,'.','.');
        $chartjs_presupuestotorta = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['No iniciado','Iniciado','Paralizado'])
        ->datasets([
            [
                'backgroundColor' => ['#F6F454', '#1FDC61','#F86F5F'],
                'hoverBackgroundColor' => ['#F6F454', '#1FDC61','#F86F5F'],
                'data' => [$noiniciado,$iniciado,$paralizado]
            ]
        ])
        ->optionsRaw("{
            legend: {
                display:true,
                position: 'bottom',
                labels: {
                    fontColor:  '#000'
                }
            },
            plugins: {
                labels: [
                    {
                      render: 'label',
                      position: 'outside'
                    },
                    {
                      render: 'percentage'
                    }
                  ]
            }
            
        }");

        $chartjs_tortaavance = app()->chartjs
        ->name('pieChartTest1')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['0% - 30%','31% - 70%','71% - 100%'])
        ->datasets([
            [
                'backgroundColor' => ['#F86F5F','#F6F454','#1FDC61'],
                'hoverBackgroundColor' => ['#F86F5F','#F6F454','#1FDC61'],
                'data' => [$avancemalo,$avancemedio,$avancebueno]
            ]
        ])
        ->optionsRaw("{
            legend: {
                display:true,
                position: 'bottom',
                labels: {
                    fontColor:  '#000'
                }
            },
            plugins: {
                labels: [
                    {
                      render: 'label',
                      position: 'outside'
                    },
                    {
                      render: 'percentage'
                    }
                  ]
            }
            
        }");

        return view('graficos.index',compact('projects','chartjs_tortaavance','chartjs_presupuestotorta','chartjs_resumeneje','metas','programas','progid','departamentos','dptoid','estados','estadoid',
        'page','expnro','proyname','satname','administracion','adminid','metaid','porcentajeid'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ToLL($north, $east, $utmZone)
    {
      // This is the lambda knot value in the reference
      $LngOrigin = Deg2Rad($utmZone * 6 - 183);

      // The following set of class constants define characteristics of the
      // ellipsoid, as defined my the WGS84 datum.  These values need to be
      // changed if a different dataum is used.

      $FalseNorth = 10000000;   // South or North?
      //if (lat < 0.) FalseNorth = 10000000.  // South or North?
      //else          FalseNorth = 0.

      $Ecc = 0.081819190842622;       // Eccentricity
      $EccSq = $Ecc * $Ecc;
      $Ecc2Sq = $EccSq / (1. - $EccSq);
      $Ecc2 = sqrt($Ecc2Sq);      // Secondary eccentricity
      $E1 = ( 1 - sqrt(1-$EccSq) ) / ( 1 + sqrt(1-$EccSq) );
      $E12 = $E1 * $E1;
      $E13 = $E12 * $E1;
      $E14 = $E13 * $E1;

      $SemiMajor = 6378137.0;         // Ellipsoidal semi-major axis (Meters)
      $FalseEast = 500000.0;          // UTM East bias (Meters)
      $ScaleFactor = 0.9996;          // Scale at natural origin

      // Calculate the Cassini projection parameters

      $M1 = ($north - $FalseNorth) / $ScaleFactor;
      $Mu1 = $M1 / ( $SemiMajor * (1 - $EccSq/4.0 - 3.0*$EccSq*$EccSq/64.0 - 5.0*$EccSq*$EccSq*$EccSq/256.0) );

      $Phi1 = $Mu1 + (3.0*$E1/2.0 - 27.0*$E13/32.0) * sin(2.0*$Mu1);
        + (21.0*$E12/16.0 - 55.0*$E14/32.0)           * sin(4.0*$Mu1);
        + (151.0*$E13/96.0)                          * sin(6.0*$Mu1);
        + (1097.0*$E14/512.0)                        * sin(8.0*$Mu1);

      $sin2phi1 = sin($Phi1) * sin($Phi1);
      $Rho1 = ($SemiMajor * (1.0-$EccSq) ) / pow(1.0-$EccSq*$sin2phi1,1.5);
      $Nu1 = $SemiMajor / sqrt(1.0-$EccSq*$sin2phi1);

      // Compute parameters as defined in the POSC specification.  T, C and D

      $T1 = tan($Phi1) * tan($Phi1);
      $T12 = $T1 * $T1;
      $C1 = $Ecc2Sq * cos($Phi1) * cos($Phi1);
      $C12 = $C1 * $C1;
      $D  = ($east - $FalseEast) / ($ScaleFactor * $Nu1);
      $D2 = $D * $D;
      $D3 = $D2 * $D;
      $D4 = $D3 * $D;
      $D5 = $D4 * $D;
      $D6 = $D5 * $D;

      // Compute the Latitude and Longitude and convert to degrees
      $lat = $Phi1 - $Nu1*tan($Phi1)/$Rho1 * ( $D2/2.0 - (5.0 + 3.0*$T1 + 10.0*$C1 - 4.0*$C12 - 9.0*$Ecc2Sq)*$D4/24.0 + (61.0 + 90.0*$T1 + 298.0*$C1 + 45.0*$T12 - 252.0*$Ecc2Sq - 3.0*$C12)*$D6/720.0 );

      $lat = Rad2Deg($lat);

      $lon = $LngOrigin + ($D - (1.0 + 2.0*$T1 + $C1)*$D3/6.0 + (5.0 - 2.0*$C1 + 28.0*$T1 - 3.0*$C12 + 8.0*$Ecc2Sq + 24.0*$T12)*$D5/120.0) / cos($Phi1);

      $lon = Rad2Deg($lon);

      // Create a object to store the calculated Latitude and Longitude values
      $PC_LatLon['lat'] = $lat;
      $PC_LatLon['lon'] = $lon;

      // Returns a PC_LatLon object
      return $PC_LatLon;
      //return "['latitude' => ".$lat.", 'longitude' => ".$lon."], ";
    }
}
