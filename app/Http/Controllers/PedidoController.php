<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use ArrayObject;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id_pedido', 'desc')->paginate(50);

        return view('admin.pedidos.gestionar', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('departamento')->get();
        return view('admin.pedidos.registrar', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreClienteEntrega'       => 'required|string|max:80',
            'ClienteEntrega'             => 'required|string|max:80',
            'TelefonoEntrega'            => 'required|string|max:15',
            'StateId'                    => 'required',
            'CountyId'                   => 'required',
            'DireccionEntrega'           => 'required|string',
            'RecogerEnSitio'             => 'required',
            'precios_productos'          => 'required'
        ]);

        $productos = $request->input('referencias_productos');
        $cantidades = $request->input('cantidades');

        for($i = 0; $i < count($productos); $i++){
            $referencia = $productos[$i];
            $producto_object = Producto::select(['PartNum', 'Name', 'Precio', 'Marks'])->where('PartNum',$referencia)->first();
            $partnum = $producto_object->PartNum;
            $name    = $producto_object->Name;
            $precio  = $producto_object->Precio;
            $marca   = $producto_object->Marks;

            $producto_array[$i] = ["PartNum"    => $partnum,
                                   "Name"       => $name,
                                   "Precio"     => (float)$precio,
                                   "Cantidad"   => (int)$cantidades[$i],
                                   "Marks"      => $marca,
                                   "Bodega"     => "BCOTA"];
        }

        $recoger_sitio = 0;
        $recoger_sitio_api = "false";
        $entrega_usuario = 0;
        $entrega_usuario_api = "false";
        if ($request->input('RecogerEnSitio') == "on") {
            $recoger_sitio = 1;
            $recoger_sitio_api = "true";
        }else{
            $entrega_usuario = 1;
            $entrega_usuario_api = "true";
        }

        $pedido = Pedido::create([
            'user_id'                    => Auth::user()->id_user,
            'AccountNum'                 => $request->input('AccountNum'),
            'NombreClienteEntrega'       => $request->input('NombreClienteEntrega'),
            'ClienteEntrega'             => $request->input('ClienteEntrega'),
            'TelefonoEntrega'            => $request->input('TelefonoEntrega'),
            'StateId'                    => $request->input('StateId'),
            'CountyId'                   => $request->input('CountyId'),
            'DireccionEntrega'           => $request->input('DireccionEntrega'),
            'RecogerEnSitio'             => $recoger_sitio,
            'EntregaUsuarioFinal'        => $entrega_usuario,
            'listaPedidoDetalle'         => json_encode($producto_array, JSON_UNESCAPED_UNICODE),
            'estado_pedido'              => "Pendiente",
            'respuesta_api_mps'          => NULL,
        ]);


        $pedido_array[0] = ["AccountNum"           => $request->input('AccountNum'),
                            "NombreClienteEntrega" => $request->input('NombreClienteEntrega'),
                            "ClienteEntrega"       => $request->input('ClienteEntrega'),
                            "TelefonoEntrega"      => $request->input('TelefonoEntrega'),
                            "StateId"              => $request->input('StateId'),
                            "CountyId"             => $request->input('CountyId'),
                            "DireccionEntrega"     => $request->input('DireccionEntrega'),
                            "RecogerEnSitio"       => $recoger_sitio_api,
                            "EntregaUsuarioFinal"  => $entrega_usuario_api,
                            "listaPedidoDetalle"   => $producto_array,
                        ];

        $envio_pedido = $this->client->request(
            'POST',
            'api/WebApi/RealizarPedido',
            [
                'headers' =>
                [
                    'Authorization' => "Bearer {$this->token_acceso_mps}"
                ],
                'form_params' => [
                    "listaPedido" => $pedido_array
                ]
            ]
        );

        $respuesta_api_mps = $envio_pedido->getBody();
        $respuesta_json_mps = json_decode($respuesta_api_mps);
        $estado_pedido = $respuesta_json_mps[0]->valor;


        if($estado_pedido == 1){
            $estado_pedido = "Realizado";

        }elseif($estado_pedido == "FAIL"){
            $estado_pedido = "Fallido";

        }else{
            $estado_pedido = "Pendiente";
        }

        //terminar ala $respuesta_api_mps;

        Pedido::where('id_pedido', $pedido->id_pedido)->update([
            'respuesta_api_mps' => json_encode($respuesta_json_mps, JSON_UNESCAPED_UNICODE),
            'estado_pedido'     => $estado_pedido
        ]);

        toast('Pedido Registrado con éxito!', 'success')->width(350);
        return redirect(route('pedido.show_voucher',$pedido->id_pedido));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pedido)
    {
        $pedido = Pedido::where('id_pedido', $id_pedido)->first();

        return view('admin.pedidos.ver', compact('pedido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_voucher($id_pedido)
    {
        $pedido = Pedido::where('id_pedido', $id_pedido)->first();

        $respuesta_api_mps = $pedido->respuesta_api_mps;
        if($respuesta_api_mps != NULL){
            $array_respuesta = json_decode($respuesta_api_mps);
            $respuesta_api_mps = $array_respuesta[0];
        }else{
            $respuesta_api_mps = NULL;
        }

        return view('admin.pedidos.voucher', compact('pedido','respuesta_api_mps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pedido)
    {
        $pedido = Pedido::where('id_pedido', $id_pedido)->first();

        return view('admin.pedidos.modificar', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pedido)
    {
        $request->validate([
            'PartNum'                 => 'required|string|max:80',
            'Familia'                 => 'required|string|max:80',
            'Categoria'               => 'required|string|max:80',
            'Name'                    => 'required|string|min:1',
            'Description'             => 'required|string|min:1',
            'Marks'                   => 'required|string|max:80',
            'Salesminprice'           => 'required|string',
            'Salesmaxprice'           => 'required|string',
            'precio'                  => 'required|string',
            'CurrencyDef'             => 'required|string|min:1|max:10',
            'Quantity'                => 'required|int',
            'TributariClassification' => 'required|string|min:1|max:20',
            'NombreImagen'            => 'required|string|min:1|max:200',
            'Descuento'               => 'required|string',
            'shipping'                => 'required|string',
            'Sku'                     => 'required|string|min:1|max:25',
        ]);

        Pedido::where('id_pedido', $id_pedido)->update([
            'PartNum'                 => $request->input('PartNum'),
            'Familia'                 => $request->input('Familia'),
            'Categoria'               => $request->input('Categoria'),
            'Name'                    => $request->input('Name'),
            'Description'             => $request->input('Description'),
            'Marks'                   => $request->input('Marks'),
            'Salesminprice'           => $request->input('Salesminprice'),
            'Salesmaxprice'           => $request->input('Salesmaxprice'),
            'precio'                  => $request->input('precio'),
            'CurrencyDef'             => $request->input('CurrencyDef'),
            'Quantity'                => $request->input('Quantity'),
            'TributariClassification' => $request->input('TributariClassification'),
            'NombreImagen'            => $request->input('NombreImagen'),
            'Descuento'               => $request->input('Descuento'),
            'shipping'                => $request->input('shipping'),
            'Sku'                     => $request->input('Sku'),

        ]);

        toast('Pedido Actualizado con éxito!', 'success')->width(250);
        return redirect(route('pedido.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pedido)
    {
        Pedido::where('id_pedido',$id_pedido)->delete();
        toast('Pedido Eliminado con éxito!', 'info')->width(250);
        return redirect(route('pedido.index'));
    }

    /**
     * Funciones y metodos de la api
     *
     */

    public function catalogo_tecnizona()
    {
        $pedidos = Pedido::orderBy('id_pedido', 'desc')->paginate(50);
        if($pedidos != []){
            $this->estructuraApi->setResultado($pedidos);
            return response()->json(
                $this->estructuraApi->toResponse($pedidos)
            );
        }else{
            $this->estructuraApi->setEstado("INF-001","info","Conectado a la api, sin datos");
            $this->estructuraApi->setResultado($pedidos);
            return response()->json(
                $this->estructuraApi->toResponse($pedidos)
            );
        }
    }

    public function get_municipios($id_departamento){
        $municipios = Municipio::where('departamento_id',$id_departamento)->get();
        foreach ($municipios as $municipio) {
            echo "<option value='{$municipio->id_municipio}'>{$municipio->municipio}</option>";
        }
    }
}
