<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Customer;
use Carbon\Carbon;
use FFI\Exception;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function getAdmin()
	{
		$product = Product::all();
		return view('admin.admin', compact('product'));
	}
	public function getAdminType()
	{
		$type = ProductType::all();
		return view('admin.admin_type', compact('type'));
	}
	public function getAdminUser()
	{
		$cus = Customer::all();
		return view('admin.admin_user', compact('cus'));
	}

    public function postSearchAd(Request $request)
	{
		$keyword = $request->keyword;
		$ketqua = Product::where('name', 'like', "%$keyword%")->orWhere('price', $keyword)->get();
		return view('admin.search_admin', compact('keyword', 'ketqua'));
	}

    public function postAddProduct(Request $request)
	{
		try {
			$product = Product::all();

			$pr = new Product();
			$pr->id_type = $request->id_type;
			$pr->name = $request->name;
			$pr->amount = $request->amount;
			$pr->price = $request->price;
			$pr->price_sale = $request->price_sale;
			$pr->image = $request->image;
			$pr->description = $request->description;

			$pr->created_at = Carbon::now()->format('Y-m-d');
			$pr->updated_at = Carbon::now()->format('Y-m-d');

			$pr->save();

			return redirect()->back()->with(['product' => $product, 'success' => 'Thêm sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['product' => $product, 'fail' => 'Thêm sản phẩm thất bại']);
		}
	}


}
