<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // All products
    public function index()
    {

        // $priceRange = explode(" ", request("price"));
        // dd((int)$priceRange[0]);
        return view('products.index', [

            'products' => Product::filter(request(["tag", "search", "price"]))
                ->paginate(10),
        ]);
    }
    // Single product
    public function show($id)
    {
        return view('products/show', ['product' => product::find($id),]);
    }

    // Create form
    public function create()
    {
        return view('products/create');
    }

    // Store product Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price' => 'required',
            'user_tel' => 'required',
            'city' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image_path'] = $this->storeImage($request);
        }

        $formFields['user_id'] = Auth::user()->id;
        $formFields['user_email'] = Auth::user()->email;

        Product::create($formFields);



        // Session::flash('message', 'Product wascreated successfully!');
        return redirect('/products')
            ->with('message', 'Product was created successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $product = Product::find($id);
        // Make sure logged in user is user
        if ($product->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized Action');
        }
        return view('products.edit', ['product' => $product]);
    }

    // Update product Data
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        // Make sure logged in user is user
        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'price' => 'required',
            'user_tel' => 'required',
            'city' => 'required',
        ]);
        if (File::exists($product->image_path)) {
            File::delete($product->image_path);
        }
        if ($request->hasFile('image')) {
            $formFields['image_path'] = $this->storeImage($request);
        }

        $formFields['user_id'] = Auth::user()->id;
        $formFields['user_email'] = Auth::user()->email;

        $product->update($formFields);

        return redirect('/products')
            ->with('message', 'Product was updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {

        $product = Product::find($id);
        // Make sure logged in user is user and not Admin
        if (
            $product->user_id != auth()->id()
            && Auth::user()->isAdmin == 0
        ) {
            abort(403, 'Unauthorized Action');
        }

        $product->delete();
        if (File::exists($product->image_path)) {
            File::delete($product->image_path);
        }
        return redirect('/products')
            ->with('message', 'Product was deleted successfully');
    }

    // Manage products
    public function manage()
    {

        return view(
            'products.manage',
            ['products' => Auth::user()->product]
        );
    }

    // Store Image
    private function storeImage($request)
    {
        $newImageName = time() . "-" . $request->name . "." .
            $request->image->extension();
        return  $request->image->move(
            "uploads/product/",
            $newImageName
        );;
    }
}
