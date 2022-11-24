<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\Catalog;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rate;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //danh sách sản phẩm trong admin
        $products = Product::all();
        //Sản phẩm được mua nhiều nhất
        $buyProductLists = OrderDetail::select('product_ID',DB::raw('sum(amount) as total'))
            ->groupBy('product_ID')
            ->orderBy('total', 'DESC')
            ->limit(1)
            ->get();

        $mostBuyProduct = Product::whereIn('id', $buyProductLists->pluck('product_ID'))
                        ->select('name')
                        ->get();
        //Tổng số sản phẩm
        $numberOfProducts = Product::count();

        //Sản phẩm được đánh giá tốt nhất
        $top_rated_product = Product::select('products.name')
                            ->Join('rate', 'products.ID', 'rate.product_ID')
                            ->orderBy('rate.star', 'DESC')
                            ->limit(1)
                            ->get();

        return view('/admin/admin_products/products', compact('products', 
                    'mostBuyProduct', 'numberOfProducts', 'top_rated_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admin thêm sản phẩm
        $catalogs = Catalog::all();
        return view('/admin/admin_products/products_create', compact('catalogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $catalog = Catalog::findOrFail($validatedData['catalog_ID']);
        $products = $catalog->products()->create([
            'catalog_ID' => $validatedData['catalog_ID'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'amount' => $validatedData['amount'],
        ]);
        
        if($request->hasFile('image')){
            $uploadPath = './img/product/';

            $i = 1;
            foreach($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $products->productImages()->create([
                    'product_ID' => $products->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        $products->save();
        return redirect()->action([AdminProductsController::class, 'create'])->with('message', 'Thêm sản phẩm thành công');
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
    public function edit(int $id)
    {
        $products = Product::findOrFail($id);
        $catalogs = Catalog::all();
        return view('/admin/admin_products/products_update', compact('products', 'catalogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $products = Catalog::findOrFail($validatedData['catalog_ID'])
            ->products()->where('id',$id)->first();
        if ($products) {
           $products->update([
            'catalog_ID' => $validatedData['catalog_ID'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'amount' => $validatedData['amount'],
           ]);
           if($request->hasFile('image')){
                $uploadPath = './img/product/';

                $i = 1;
                foreach($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $products->productImages()->create([
                        'product_ID' => $products->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            $products->save();
            return redirect()->action([AdminProductsController::class, 'index'])->with('message', 'Cập nhật sản phẩm thành công');
        } else {
            return redirect()->action([AdminProductsController::class, 'index'])->with('message', 'Không tìm thấy ID sản phẩm này!');
        }
       
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ImageProduct::findOrFail($product_image_id);
        if(File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Xóa ảnh thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->action([AdminProductsController::class, 'index'])->with('message', 'Xóa sản phẩm thành công');
    }

    //Tính năng tìm kiếm
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        return view('/admin/admin_products/products', compact('products'));
    }
}
