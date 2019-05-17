<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Observacion;
use App\ObservacionFonavis;
use App\Programa;
use App\Departamento;
use App\Estado;
use App\SIG005;
use App\SIG006;
use App\Administracion;
use App\Terreno;
use App\Meta;
use Mapper;
use App\Exports\HistorialExport;
use App\Exports\ProjectExport;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $products = Estado::all();
        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }

    public function details()
    {
        $products = Estado::all();
        return response()->json(['success' => $user], $this->successStatus);
    }

}
