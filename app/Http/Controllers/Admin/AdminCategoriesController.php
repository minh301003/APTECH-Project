<?php

namespace App\Http\Controllers\Admin;
use App\Models\Catalog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        //danh sách danh mục sản phẩm
        $catalogs = Catalog::all();
        return view('/admin/admin_catalog/catalogs', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admin thêm danh mục
        return view('/admin/admin_catalog/catalogs_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Catalog::create([
            'catalog_name' => $request->catalog_name,
        ]);
        return redirect()->action([AdminCategoriesController::class, 'index'])->with('message', 'Thêm danh mục thành công');
    }

}
