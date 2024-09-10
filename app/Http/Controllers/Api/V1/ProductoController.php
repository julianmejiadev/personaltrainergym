<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Producto::all(), 200); // mostrar todos los productos
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        $datos = $request->validate([
           'nombre'=> ['required','string', 'max:100'],
           'descripcion'=> ['nullable', 'string','max:300'],
           'precio' => ['required','integer','min:3000'],
        ]); 

        // guardar datos
        $producto = Producto::create($datos);
        
        //respuesta al cliente 
        return response()->json([
            'success' => true,
            'message' => 'el producto fue creado exitosamente', 
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
       return response()->json($producto, 200); //mostrar un producto
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
         //validar datos
         $datos = $request->validate([
            'nombre'=> ['required','string', 'max:100'],
            'descripcion'=> ['nullable', 'string','max:300'],
            'precio' => ['required','integer','min:3000'],
         ]); 
 
         // actualizar datos
         $producto->update($datos);
         
         //respuesta al cliente 
         return response()->json([
             'success' => true,
             'message' => 'el producto fue actualizado exitosamente', 
         ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        //eliminar producto
        $producto->delete();

        //respuesta al cliente
        return response()->json([
            'success' => true,
            'message' => 'el producto fue eliminado exitosamente', 
        ], 204);
    }
}
