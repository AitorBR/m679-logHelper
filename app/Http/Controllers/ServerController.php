<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\StorePostRequest;
use App\Models\Server;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use Illuminate\Http\Response;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['status' => 'ok', 'data' => Server::all()], 200);
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
    }
*/
    /*
    public function store(Request $request)
    {
        // Método llamado al hacer un POST.
        // Comprobamos que recibimos todos los campos.
        /*if (!$request->input('id')) // || !$request->input('ipv6') || !$request->input('location')
        {
            // NO estamos recibiendo los campos necesarios. Devolvemos error.
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan datos necesarios para procesar el alta.'])], 422);
        }

        // Insertamos los datos recibidos en la tabla.
        $nuevoFabricante = Server::create($request->all());

        // Devolvemos la respuesta Http 201 (Created) + los datos del nuevo fabricante + una cabecera de Location + cabecera JSON
        $respuesta = Response::make(json_encode(['data' => $nuevoFabricante]), 201)->header('Location', 'http://localhost/server/storage' . $nuevoFabricante->id)->header('Content-Type', 'application/json');
        return $respuesta;
    }
    */
    public function store(Request $request)
    {
        /*$rules = [
        'description' => 'required',
        'location' => 'required'
    ];*/

        // $messages = [
        //     'required' => 'El camp :attribute no pot estar buit.',
        //     'min' => [
        //         'string' => 'El camp :attribute ha de tenir  :min caràcters.',
        //     ],
        // ];

        //$validated = $request->validated();

        //$post = new Server();
        // $post->title = $validated['title']; // $request->input('title');
        // $post->content = $validated['content']; //$request->input('content');
        // $post->save();

        //Server::create($validated['ipv4'], $validated['ipv6'], $validated['location'], $validated['description']);

        //$post = Server::make($validated['ipv4'], $validated['ipv6'], $validated['location'], $validated['description']);
        //$post->save();

        //$post->fill($validated['ipv4'], $validated['ipv6'], $validated['location'], $validated['description']);

        //$request->session()->flash('status', 'Post creat correctament');
        //return redirect()->route('posts.show', ['post' => $post->id]);


        //Validate

        $request->validate([
            'ipv4' => 'string|nullable',
            'ipv6' => 'string|nullable',
            'description' => 'required',
            'location' => 'required'
        ]);

        Server::create(['ipv4' => $request->ipv4 ?? '', 'ipv6' => $request->ipv6 ?? '', 'description' => $request->description, 'location' => $request->location]);
        //return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);
/*
        $dupli2 = Server::find($request->ipv6);
        return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
*/
        /*if ($request->ipv4 != null) {
            $dupli = Server::find($request->ipv4);
            if (!$dupli) {
                if ($request->ipv6 != null) {
                    $dupli2 = Server::find($request->ipv6);
                    if (!$dupli2) {
                        return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);
                    } else {
                        return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);

                        Server::create(['ipv4' => $request->ipv4 ?? '', 'ipv6' => $request->ipv6 ?? '', 'description' => $request->description, 'location' => $request->location]);
                    }
                } else {
                    return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);
                }
            }
        } else {
            if ($request->ipv6 != null) {
                $dupli2 = Server::find($request->ipv6);
                if (!$dupli2) {
                    return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);
                } else {
                    return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);

                    Server::create(['ipv4' => $request->ipv4 ?? '', 'ipv6' => $request->ipv6 ?? '', 'description' => $request->description, 'location' => $request->location]);
                }
            }
        }
*/
        //$a = Server::create(['ipv4' => $request->ipv4 ?? '', 'ipv6' => $request->ipv6 ?? '', 'description' => $request->description, 'location' => $request->location]);


        //return redirect('/tasks/'.$task->id);

        /*
        if ($a == false) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);

        } else {
            return response()->json(['errors' => array(['code' => 406, 'message' => 'No se encuentra un fabricante con ese código.'])], 406);

        }
        */
        /*
        $messages =  $request->validate->errors();

        //return $messages;
        return response()->json(['errors' => array(['code' => 404, $messages])], 404);
*/
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    /*
    public function messages()
    {
        return [
            'ipv4.unique' => 'A ipv4 exist',
            'ipv6.unique' => 'A ipv6 exist',
        ];
    }
*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
        return view('server.profile', [
            'user' => Server::findOrFail($id)
        ]);
    }*/
    public function show($id)
    {
        // Corresponde con la ruta /fabricantes/{fabricante}
        // Buscamos un fabricante por el ID.
        $fabricante = Server::find($id);

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
        // Vamos a actualizar un fabricante.
        // Comprobamos si el fabricante existe. En otro caso devolvemos error.
        $fabricante = Server::find($id);

        // Si no existe mostramos error.
        if (!$fabricante) {
            // Devolvemos error 404.
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }


        $request->validate([
            'ipv4' => 'string|nullable',
            'ipv6' => 'string|nullable',
            'description' => 'required',
            'location' => 'required'
        ]);

        // Almacenamos en variables para facilitar el uso, los campos recibidos.
        $ipv4 = $request->input('ipv4');
        $ipv6 = $request->input('ipv6');
        $location = $request->input('location');
        $description = $request->input('description');

        // Comprobamos si recibimos petición PATCH(parcial) o PUT (Total)
        if ($request->method() == 'PATCH') {
            $bandera = false;

            // Actualización parcial de datos.
                $fabricante->ipv4 = $ipv4 ?? '';
                $bandera = true;

            // Actualización parcial de datos.
                $fabricante->ipv6 = $ipv6 ?? '';
                $bandera = true;

            // Actualización parcial de datos.
            if ($location != null && $location != '') {
                $fabricante->location = $location;
                $bandera = true;
            }

            if ($description != null && $description != '') {
                $fabricante->description = $description;
                $bandera = true;
            }

            if ($bandera) {
                // Grabamos el fabricante.
                $fabricante->save();

                // Devolvemos un código 200.
                return response()->json(['status' => 'ok', 'data' => $fabricante], 200);
            } else {
                // Devolvemos un código 304 Not Modified.
                return response()->json(['errors' => array(['code' => 304, 'message' => 'No se ha modificado ningún dato del fabricante.'])], 304);
            }
        }


        // Método PUT actualizamos todos los campos.
        // Comprobamos que recibimos todos.

        // podemos no necesitar los valores, si uno esta lleno nos vale
        /*
		if (!$ipv4 || !$ipv6 || !$location || $description)
		{
			// Se devuelve código 422 Unprocessable Entity.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
		}
        */

        // Actualizamos los 3 campos:
        $fabricante->ipv4 = $ipv4;
        $fabricante->ipv6 = $ipv6;
        $fabricante->location = $location;
        $fabricante->description = $description;


        // Grabamos el fabricante
        $fabricante->save();
        return response()->json(['status' => 'ok', 'data' => $fabricante], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Borrado de un fabricante.
        // Ejemplo: /fabricantes/89 por DELETE
        // Comprobamos si el fabricante existe o no.
        $fabricante = Server::find($id);

        if (!$fabricante) {
            // Devolvemos error codigo http 404
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra el fabricante con ese código.'])], 404);
        }

        // Borramos el fabricante y devolvemos código 204
        // 204 significa "No Content".
        // Este código no muestra texto en el body.
        // Si quisiéramos ver el mensaje devolveríamos
        // un código 200.
        // Antes de borrarlo comprobamos si tiene aviones y si es así
        // sacamos un mensaje de error.
        // $aviones = $fabricante->aviones()->get();
        $aviones = $fabricante->logs;

        if (sizeof($aviones) > 0) {
            // Si quisiéramos borrar todos los aviones del fabricante sería:
            // $fabricante->aviones->delete();

            // Devolvemos un código 409 Conflict. 
            return response()->json(['errors' => array(['code' => 409, 'message' => 'Este fabricante posee aviones y no puede ser eliminado.'])], 409);
        }

        // Eliminamos el fabricante si no tiene aviones.
        $fabricante->delete();

        // Se devuelve código 204 No Content.
        return response()->json(['code' => 204, 'message' => 'Se ha eliminado correctamente el fabricante.'], 204);
    }
}
