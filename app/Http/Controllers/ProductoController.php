<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductoController extends Controller
{
    /**
    *   Función: index()
    *   Ruta:    producto.index
    *   Autor:   Cristhian Cañar
    *   Descripción: Función encargada de desplegar la vista gestionar Productos con los datos de la tabla Productos
    *   Fecha de Creación: 2021-06-01
    *   Versión: 1.0
     */
    public function index()
    {
        $productos = Producto::orderBy('id_producto', 'desc')->paginate(50);

        return view('admin.productos.gestionar', compact('productos'));
    }

    /**
    *   Función: index()
    *   Ruta:    cargar_productos
    *   Autor:   Cristhian Cañar
    *   Descripción: Función encargada de obtener los productos de la API y almacenarlos
    *                en la tabla Productos
    *   Fecha de Creación: 2021-06-01
    *   Versión: 1.0
     */
    public function cargar_productos()
    {
        //Cliente para la obtención del token actual
        $cliente_token = new Client();
        //Credenciales de acceso de la empresa para el uso de la api de MPS
        try {
            $respuesta = $cliente_token->request('POST', 'https://shopcommerce.mps.com.co:7071/Token', [
                'form_params' => [
                    'grant_type'    => 'password',
                    'username'      => 'pruebas@stac.com.co',
                    'password'      => 'Hka2cTyLIR'
                ]
            ]);
            $autorizacion = json_decode($respuesta->getBody(), true);

            $token_acceso_mps = $autorizacion["access_token"];

            toast('Conexión con MPS establecida!', 'success')->width(350);
        } catch (BadResponseException $e) {
            toast('Error de conexión con MPS! (Credenciales invalidas)', 'error')->width(350);
            return redirect(route('producto.index'));
        }

        //Uso del cliente para realizar el pedido ante MPS
        $cliente_carga_productos = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://shopcommerce.mps.com.co:7071/',
            // You can set any number of default request options.
            'timeout'  => 10,
        ]);

        $catalogo = $cliente_carga_productos->request(
            'GET',
            'api/WebApi/GetConsultarCatalogo',
            [
                'headers' =>
                [
                    'Authorization' => "Bearer {$token_acceso_mps}"
                ]
            ]
        )->getBody();

        $productos = json_decode($catalogo, true);
        //Obtener los datos de la tabla producto para validacion
        $info_productos = Producto::count();

        $contador_productos_eliminados = 0;
        $contador_productos_actualizados = 0;
        $contador_productos_registrados = 0;

        if($info_productos == 0){
            foreach ($productos as $producto) {
                if($producto['Quantity'] > 0){
                    Producto::create([
                        'PartNum'                 => $producto['PartNum'],
                        'Familia'                 => $producto['Familia'],
                        'Categoria'               => $producto['Categoria'],
                        'Name'                    => $producto['Name'],
                        'Description'             => $producto['Description'],
                        'Marks'                   => $producto['Marks'],
                        'Salesminprice'           => $producto['Salesminprice'],
                        'Salesmaxprice'           => $producto['Salesmaxprice'],
                        'precio'                  => $producto['precio'],
                        'CurrencyDef'             => $producto['CurrencyDef'],
                        'Quantity'                => $producto['Quantity'],
                        'TributariClassification' => $producto['TributariClassification'],
                        'NombreImagen'            => $producto['NombreImagen'],
                        'Descuento'               => $producto['Descuento'],
                        'shipping'                => $producto['shipping'],
                        'Sku'                     => $producto['Sku'],
                    ]);
                }
                $contador_productos_registrados++;
            }
            alert()->success(''.$contador_productos_registrados.' Productos registrados con éxito!')->autoClose(5000);
            return redirect(route('producto.index'));

        }else{
            foreach ($productos as $producto) {
                if($producto['Quantity'] > 0){
                    $producto_existente = Producto::where('PartNum',$producto['PartNum'])->first();
                    if($producto_existente != NULL){
                        Producto::where('id_producto', $producto_existente->id_producto)->update([
                            'Familia'                 => $producto['Familia'],
                            'Categoria'               => $producto['Categoria'],
                            'Description'             => $producto['Description'],
                            'Marks'                   => $producto['Marks'],
                            'Salesminprice'           => $producto['Salesminprice'],
                            'Salesmaxprice'           => $producto['Salesmaxprice'],
                            'precio'                  => $producto['precio'],
                            'CurrencyDef'             => $producto['CurrencyDef'],
                            'Quantity'                => $producto['Quantity'],
                            'TributariClassification' => $producto['TributariClassification'],
                            'NombreImagen'            => $producto['NombreImagen'],
                            'Descuento'               => $producto['Descuento'],
                        ]);
                    }
                    $contador_productos_actualizados++;
                }else{
                    Producto::where('PartNum',$producto['PartNum'])->delete();
                    $contador_productos_eliminados++;
                }

            }
            alert()->info(''.$contador_productos_actualizados.' Productos actualizados con éxito!, '.$contador_productos_eliminados.' Productos eliminados por inexistencia en inventario MPS')->autoClose(5000);
            return redirect(route('producto.index'));

        }

    }

    /**
    *   Función: index()
    *   Ruta:    producto.index
    *   Autor:   Cristhian Cañar
    *   Descripción: Función encargada de desplegar la vista gestionar Pedidos con los datos de la tabla Pedidos
    *   Fecha de Creación: 2021-06-01
    *   Versión: 1.0
     */
    public function create()
    {
        return view('admin.productos.registrar');
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

        Producto::create([
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

        toast('Producto Registrado con éxito!', 'success')->width(250);
        return redirect(route('producto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_producto)
    {
        $producto = Producto::where('id_producto', $id_producto)->first();

        return view('admin.productos.ver', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
    {
        $producto = Producto::where('id_producto', $id_producto)->first();

        return view('admin.productos.modificar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
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

        Producto::where('id_producto', $id_producto)->update([
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

        toast('Producto Actualizado con éxito!', 'success')->width(250);
        return redirect(route('producto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        Producto::where('id_producto', $id_producto)->delete();
        toast('Producto Eliminado con éxito!', 'info')->width(250);
        return redirect(route('producto.index'));
    }

    /**
     * Funciones y metodos de la api
     *
     */

    public function catalogo_tecnizona()
    {
        $productos = Producto::orderBy('id_producto', 'desc')->paginate(50);
        if ($productos != []) {
            $this->estructuraApi->setResultado($productos);
            return response()->json(
                $this->estructuraApi->toResponse($productos)
            );
        } else {
            $this->estructuraApi->setEstado("INF-001", "info", "Conectado a la api, sin datos");
            $this->estructuraApi->setResultado($productos);
            return response()->json(
                $this->estructuraApi->toResponse($productos)
            );
        }
    }

    public function buscar_producto(Request $request)
    {
        $datos = $request->all();
        $producto = Producto::select(['PartNum', 'Name', 'precio'])
            ->where('PartNum', 'like', $datos['ref_producto'] . "%")
            ->take(5)->get();
        return $producto;
    }
}
