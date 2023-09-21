<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//use App\Models\ProductModel;

class ProductController extends BaseController
{ 
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
    }

    public function delete($id)
    {
        $this->category->delete($id);
        $this->product->delete($id);
        return redirect()->to('/product');
    }

    public function edit($id)
    {
        $data = [
        'product' => $this->product->findAll(),
        'pro' => $this->product->where('id', $id)->first(),
        ];
        return view('products', $data);
    }

    public function save()
    {
        $id =$_POST['id'];
        $productData = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription' => $this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity' => $this->request->getVar('ProductQuantity'),
            'ProductPrice' => $this->request->getVar('ProductPrice'),
        ];

        $categoryData = [
            'ProductCategory' => $this->request->getVar('ProductCategory'),
        ];

            if($id!= null)
                {
                    $this->product->set($productData)->where('id', $id)->update();
                    $this->category->set($categoryData)->where('id', $id)->update();
                }
                else{
                    $this->product->insert($productData);

            
                    $this->category->insert($categoryData);
                }
                return redirect()->to('/product');
    }

    public function product($product)
    {
        echo $product;
    }

    public function CaibalLester()
    {
        $data['product'] = $this->product->findAll();
        return view('products', $data);
    }

    public function index()
    {
        //
    }
}
