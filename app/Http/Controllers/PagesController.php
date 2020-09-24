<?php

namespace App\Http\Controllers;
use App\Models\Pettycash;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Withdraw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    	public function getIndex()
	{	
		$product = Product::join('productcategories', 'products.productcategory_id', '=', 'productcategories.id')
            ->select('products.*', 'productcategories.name as n')
            ->get();
        return view('backend.product.list', compact('product'));

	}
}

