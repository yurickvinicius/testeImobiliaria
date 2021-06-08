<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;
use File;


class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $product){
        $this->productModel = $product;
    }
    
    public function index(){        
        $products = $this->productModel->paginate(3);
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(ProductRequest $request){
        /////////  image    
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {                                    
                
            $extension = $request->image->extension();
                           
            if($extension == 'jpg'){                
                $name = uniqid(date('HisYmd'));
                $nameFile = "{$name}.{$extension}";                
                $upload = $request->image->storeAs('products', $nameFile);            
            }
        }
        //////// 
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product['nameFile'] = $nameFile;

        $product->save();        
        
        return redirect()
            ->route('products')
            ->with('sucess', 'Produto cadastrado com successo!');
    }

    public function delete($id){        
        ///// image
        $product = $this->productModel->find($id);
        $image = $product['nameFile'];

        if($image != null){
            $image_path = base_path('public/uploads/products/'.$image); 

            if (File::exists($image_path))
                unlink($image_path);
        }        
        ///////////

        $this->productModel->find($id)->delete($id);

        return back()->with('error', 'Produto deletato com successo!')->withInput();
        ///return redirect()->route('products');
    }

    public function edit($id){
        $product = $this->productModel->find($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request){ 
        
        ///dd($request);

        $id = $request->id;


        $this->productModel->find($id)->update($request->all());
        return redirect()
            ->route('products')
            ->with('sucess', 'Produto atualizado com successo!');


    }

}
