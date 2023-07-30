<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

use Illuminate\Http\Response;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        //
    }*/
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => Log::all()], 200);
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
        /*// Método llamado al hacer un POST.
		// Comprobamos que recibimos todos los campos.
		if (!$request->input('id')) // || !$request->input('direccion') || !$request->input('telefono')
		{
			// NO estamos recibiendo los campos necesarios. Devolvemos error.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para procesar el alta.'])],422);
		}

		// Insertamos los datos recibidos en la tabla.
		$nuevoFabricante=Log::create($request->all());

		// Devolvemos la respuesta Http 201 (Created) + los datos del nuevo fabricante + una cabecera de Location + cabecera JSON
		$respuesta= Response::make(json_encode(['data'=>$nuevoFabricante]),201)->header('Location','http://localhost/log/'.$nuevoFabricante->id)->header('Content-Type','application/json');
		return $respuesta;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/
    public function show($id)
    {
        // Corresponde con la ruta /fabricantes/{fabricante}
        // Buscamos un fabricante por el ID.
        $fabricante = Log::find($id);

        // Chequeamos si encontró o no el fabricante
        if (!$fabricante) {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        // Devolvemos la información encontrada.
        return response()->json(['status' => 'ok', 'data' => $fabricante], 200);
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

        //No necesario implementar
    }
}
