<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use App\Models\Log;
use Response;

class ServerLogController extends Controller
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
    public function index($idFabricante)
    {
        // Devolverá todos los aviones.
        //return "Mostrando los aviones del fabricante con Id $idFabricante";
        $fabricante = Server::find($idFabricante);

        if (!$fabricante) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        return response()->json(['status' => 'ok', 'data' => $fabricante->logs()->get()], 200);
        //return response()->json(['status'=>'ok','data'=>$fabricante->aviones],200);
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
    /*public function store(Request $request)
    {
        //
    }*/
    public function store(Request $request, $idFabricante)
    {
        /* Necesitaremos el fabricante_id que lo recibimos en la ruta
		 #Serie (auto incremental)
		timestamp
		description
		Capacidad
		Velocidad
		Alcance */

        // Primero comprobaremos si estamos recibiendo todos los campos.
        /*if ( !$request->input('timestamp') || !$request->input('description') || !$request->input('capacidad') || !$request->input('velocidad') || !$request->input('alcance') )
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el proceso de alta.'])],422);
		}*/

        // Buscamos el Fabricante.
        $fabricante = Server::find($idFabricante);

        // Si no existe el fabricante que le hemos pasado mostramos otro código de error de no encontrado.
        if (!$fabricante) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        // Si el fabricante existe entonces lo almacenamos.
        // Insertamos una fila en Aviones con create pasándole todos los datos recibidos.
        $nuevoAvion = $fabricante->logs()->create($request->all());

        // Más información sobre respuestas en http://jsonapi.org/format/
        // Devolvemos el código HTTP 201 Created – [Creada] Respuesta a un POST que resulta en una creación. Debería ser combinado con un encabezado Location, apuntando a la ubicación del nuevo recurso.
        return response()->json(['data' => $nuevoAvion], 201)->header('Location',  url('/api/v1/') . '/logs/' . $nuevoAvion->id);
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
    /*public function update(Request $request, $id)
    {
        //
    }*/

    public function update(Request $request, $idFabricante, $idAvion)
    {
        // Comprobamos si el fabricante que nos están pasando existe o no.
        $fabricante = Server::find($idFabricante);

        // Si no existe ese fabricante devolvemos un error.
        if (!$fabricante) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        // El fabricante existe entonces buscamos el avion que queremos editar asociado a ese fabricante.
        $avion = $fabricante->logs()->find($idAvion);

        // Si no existe ese avión devolvemos un error.
        if (!$avion) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un avión con ese código asociado al fabricante.'])], 404);
        }


        // Listado de campos recibidos teóricamente.
        /*
        'timestamp' =>   $date." ".$time,
        'description' => $this->faker->text(5),
*/
        $timestamp = $request->input('timestamp');
        $description = $request->input('description');

        // Necesitamos detectar si estamos recibiendo una petición PUT o PATCH.
        // El método de la petición se sabe a través de $request->method();
        /*  timestamp      description        Capacidad       Velocidad       Alcance */
        if ($request->method() === 'PATCH') {
            // Creamos una bandera para controlar si se ha modificado algún dato en el método PATCH.
            $bandera = false;

            // Actualización parcial de campos.
            if ($timestamp) {
                $avion->timestamp = $timestamp;
                $bandera = true;
            }

            if ($description) {
                $avion->description = $description;
                $bandera = true;
            }

            if ($bandera) {
                // Almacenamos en la base de datos el registro.
                $avion->save();
                return response()->json(['status' => 'ok', 'data' => $avion], 200);
            } else {
                // Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
                // Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
                return response()->json(['errors' => array(['code' => 304, 'message' => 'No se ha modificado ningún dato del avión.'])], 304);
            }
        }

        // Si el método no es PATCH entonces es PUT y tendremos que actualizar todos los datos.
        if (!$timestamp || !$description) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan valores para completar el procesamiento.'])], 422);
        }

        $avion->timestamp = $timestamp;
        $avion->description = $description;

        // Almacenamos en la base de datos el registro.
        $avion->save();

        return response()->json(['status' => 'ok', 'data' => $avion], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idFabricante, $idAvion)
    {
        // Comprobamos si el fabricante que nos están pasando existe o no.
        $fabricante = Server::find($idFabricante);

        // Si no existe ese fabricante devolvemos un error.
        if (!$fabricante) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        // El fabricante existe entonces buscamos el avion que queremos borrar asociado a ese fabricante.
        $avion = $fabricante->logs()->find($idAvion);

        // Si no existe ese avión devolvemos un error.
        if (!$avion) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un avión con ese código asociado a ese fabricante.'])], 404);
        }

        // Procedemos por lo tanto a eliminar el avión.
        $avion->delete();

        // Se usa el código 204 No Content – [Sin Contenido] Respuesta a una petición exitosa que no devuelve un body (como una petición DELETE)
        // Este código 204 no devuelve body así que si queremos que se vea el mensaje tendríamos que usar un código de respuesta HTTP 200.
        return response()->json(['code' => 204, 'message' => 'Se ha eliminado el avión correctamente.'], 204);
    }
}
