<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('id_producto', 'desc')->paginate(50);

        return view('admin.productos.gestionar', compact('productos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargar_productos()
    {
        /* Poblar los datos de la base de datos con la api*/
        $catalogo = $this->client->request(
            'GET',
            'api/WebApi/GetConsultarCatalogo',
            [
                'headers' =>
                [
                    'Authorization' => "Bearer {$this->token_acceso_mps}"
                ]
            ]
        )->getBody();

        $productos = json_decode($catalogo, true);

        foreach ($productos as $producto){
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

        toast('Productos cargados con éxito!', 'success')->width(250);
        return redirect(route('producto.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        Producto::where('id_producto',$id_producto)->delete();
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
        if($productos != []){
            $this->estructuraApi->setResultado($productos);
            return response()->json(
                $this->estructuraApi->toResponse($productos)
            );
        }else{
            $this->estructuraApi->setEstado("INF-001","info","Conectado a la api, sin datos");
            $this->estructuraApi->setResultado($productos);
            return response()->json(
                $this->estructuraApi->toResponse($productos)
            );
        }
    }
}
