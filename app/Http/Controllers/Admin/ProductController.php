<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Product;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        // cara 1 Validasi
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required|min:20',
        //     'image' => 'required',
        //     'categories' => 'required',
        //     'price' => 'required|numeric',
        //     'qty' => 'required|numeric',
        // ]);

        // cara 2 Validasri Pakau form Request



        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products');
        }

        $categories = Category::find($request->categories);

        // Cara 1
        // $product = Product::create([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $image,
        //     'price' => $request->price,
        //     'qty' => $request->qty,
        // ]);

        // cara 2
        $data = array_merge(
            $request->except('_token', 'categories', 'image'),
            compact('image')
        );

        $product = Product::create($data);


        $product->categories()->attach($categories);

        session()->flash('message', 'Product Successfully Added.');

        return redirect()->route('admin.products.index');
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
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required|min:20',
        //     'categories' => 'required',
        //     'price' => 'required|numeric',
        //     'qty' => 'required|numeric',
        // ]);

        $image = $product->image ?? null;

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $image = $request->file('image')->store('products');
        }

        $categories =  Category::find($request->categories);

        // Cara 1 update
        // $product->update([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $image,
        //     'price' => $request->price,
        //     'qty' => $request->qty,
        // ]);

        // cara 2 update
        $data = array_merge(
            $request->except('_token', '_method', 'categories', 'image'),
            compact('image')
        );

        $product->update($data);

        $product->categories()->sync($categories);

        session()->flash('message', 'Product Updated');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();
        return response()->json(['success' => true]);
    }
}
