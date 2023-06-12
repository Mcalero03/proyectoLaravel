<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use PDF;
use Illuminate\Support\Facades\App;

class ProyectoController extends Controller
{
    public function getPDF()
    {
        $proyectos = Proyecto::all();
        $name = "Gobierno de El Salvador";
        $institution = "Ministerio de Cultura";
        $date = "11/06/2023";

        $pdf = App::make('dompdf.wrapper');
        $html = '<h4>' . $name . '</h4>
         <h4>' . $institution . '</h4>
         <h4>' . $date . '</h4>
         <table style="border: 1px solid black">
            <thead>
                <tr>
                    <th scope="col" style="border: 1px solid black">#</th>
                    <th scope="col" style="border: 1px solid black">Proyecto</th>
                    <th scope="col" style="border: 1px solid black">Fuente Fondos</th>
                    <th scope="col" style="border: 1px solid black">Monto Planificado</th>
                    <th scope="col" style="border: 1px solid black">Monto Patrocinado</th>
                    <th scope="col" style="border: 1px solid black">Monto Fondos Propios</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($proyectos as $proyecto) {
            $html .= '
                <tr>
                    <td style="border: 1px solid black">' . $proyecto->id . '</td>
                    <td style="border: 1px solid black">' . $proyecto->nombre_proyecto . '</td>
                    <td style="border: 1px solid black"> ' . $proyecto->fuente_fondos . '</td>
                    <td style="border: 1px solid black">' . $proyecto->monto_planificado . '</td>
                    <td style="border: 1px solid black"> ' . $proyecto->monto_patrocinado . '</td>
                    <td style="border: 1px solid black">' . $proyecto->monto_fondos_propios . '</td>
                </tr>';
        }

        $html .= '</tbody>
        </table>';

        $pdf->loadHTML($html);
        return $pdf->stream('prueba.pdf', $name);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index')->with('proyectos', $proyectos);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->fuente_fondos = $request->get('fuente_fondos');
        $proyecto->monto_planificado = $request->get('monto_planificado');
        $proyecto->monto_patrocinado = $request->get("monto_patrocinado");
        $proyecto->monto_fondos_propios = $request->get('monto_fondos_propios');

        $proyecto->save();

        return redirect('/proyectos');
    }

    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->fuente_fondos = $request->get('fuente_fondos');
        $proyecto->monto_planificado = $request->get('monto_planificado');
        $proyecto->monto_patrocinado = $request->get("monto_patrocinado");
        $proyecto->monto_fondos_propios = $request->get('monto_fondos_propios');

        $proyecto->save();

        return redirect('/proyectos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        return redirect('/proyectos');
    }
}
