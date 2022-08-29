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
    public function index($id)
    {
        $products = Product::where('user_id', '=', $id)->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();

        $user_id = Crypt::decrypt($id);
        return view('admin.products.create', compact('user_id'));
        dd($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image_path = Storage::put('products_imgs', $data['img']);
        $data['img'] = $image_path;
        $product = new Product();
        $product->fill($data);
        $product->slug = $this->generateSlug($product->name);
        $product->save();
        return redirect()->route('admin.products.show', ['slug' => $product->slug, 'id' => Crypt::encrypt($product->user_id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $user = Auth::user();
        $user_id = Crypt::decrypt($id);
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
    }

    public static function generateSlug($name)
    {
        $init_slug = Str::slug($name, '-');
        $slug = $init_slug;
        $count = 1;
        $product_found = Product::where('slug', $slug)->first();
        while ($product_found) {
            $slug = $init_slug . '-' . $count;
            $product_found = Product::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}
