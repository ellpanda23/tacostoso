<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    protected $paginationTheme = "bootstrap";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image'
        ]);

        // $imagen = $request->file('file')->store('/public/products');

        // $url = Storage::url($imagen);

        $name = Str::random(10).$request->file('file')->getClientOriginalName();

        // return storage_path();

        return $ruta = storage_path().'\app\public\products/'.$name;

        Image::make($request->file('file'))
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $product = Product::create($request->all());

        $product->image = '/storage/products/'.$name;

        $product->save();

        return redirect()->route('admin.products.index');
        // TODO MANDAR NOTIFICACIÓN DE CREACIÓN
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // TODO ELIMINAR IMAGEN ANTERIOR Y ACTUALIZAR A LA NUEVA
        $product->update($request->all());
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
