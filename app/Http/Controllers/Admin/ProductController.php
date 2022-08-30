<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $products = Product::where('user_id', '=', $user_id)->get();
        return view('admin.show', compact('products', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user_id = $user->id;
        return view('admin.products.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        $data = $request->all();
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $image_path = Storage::put('products_imgs', $data['img']);
        $data['img'] = $image_path;
        $product = new Product();
        $product->fill($data);
        $product->slug = Product::generateSlug($product->name);
        $product->save();
        return redirect()->route('admin.products.show', ['slug' => $product->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $user_id = $user->id;
        // $user_id = $user->id;
        $product = Product::where('slug', '=', $slug)->where('user_id', '=', $user_id)->first();
        // dd($user_id);
        return view('admin.products.show', compact('product', 'user', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $product = Product::where('slug', '=', $slug)->first();
        return view('admin.products.edit', compact('product', 'user', 'user_id'));
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
        $request->validate($this->getValidationRules());
        $user = Auth::user();
        $user_id = $user->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
        $product = Product::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
        if (isset($data['img'])) {
            if ($product->img) {
                Storage::delete($product->img);
            }
            $image_path = Storage::put('products_imgs', $data['img']);
            $data['img'] = $image_path;
        }
        if (!($data['name'] === $product->name)) {
            $data['slug'] = Product::generateSlug($data['name']);
            $product->slug = $data['slug'];
        }
        $product->update($data);
        return redirect()->route('admin.products.show', ['slug' => $product->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Se c'è l'immagine cover, allora la cancelliamo
        if ($product->img) {
            Storage::delete($product->img);
        }
        $product->delete();
        return redirect()->route('admin.products');
    }

    private function getValidationRules() {
        return [
            'name' => 'required|min:3|max:255',
            'img' => 'max:30000',
            'price' => 'required',
            'description' => 'nullable|max:30000',
            'ingredients' => 'required|min:3|max:30000',
            'visibility' => 'required'
        ];
    }

}
