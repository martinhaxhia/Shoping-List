<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;

use App\Services\ProductService;

use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{

    private $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return  view ('products.create');
    }

    /**
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {

        $validated = $request->validated();

        $data = $request->all();

        $product = $this->productService->create($data);

        return redirect()->route('products.index');

    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * @param StoreProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductRequest $request, Product $product)
    {
            $data = $request->all();

            $newProduct = $this->productService->updateProduct($product, $data);

            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete($id)
    {
        $product = Product::find($id);

        return view('products.delete', compact('product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }

}
