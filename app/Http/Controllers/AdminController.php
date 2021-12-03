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
		$product = Product::where('name', 'like', "%$keyword%")->get();
		return view('admin.admin', compact('product'));
	}

	public function postSearchUser(Request $request)
	{
		$keyword = $request->keyword;
		$cus = Customer::where('name', 'like', "%$keyword%")->get();
		return view('admin.admin_user', compact('product'));
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

	public function getUpdateProduct($id)
	{
		$row = Product::find($id);
		return view('admin.update_product', compact('row'));
	}

	public function postUpdateProduct(Request $request)
	{
		try {
			$pr = Product::find($request->id);

			if($request->id_type) 
			$pr->id_type = $request->id_type;
			
			if($request->name) 
			$pr->name = $request->name;
			
			if($request->amount)	
			$pr->amount = $request->amount;
			
			if($request->price)	
			$pr->price = $request->price;
			
			if($request->price_sale) 
			$pr->price_sale = $request->price_sale;
			
			if($request->image)
			$pr->image = $request->image;
			
			if($request->description)
			$pr->description = $request->description;

			$pr->save();
			return redirect()->route('admin')->with(['success' => 'Sửa sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['fail' => 'Sửa sản phẩm thất bại']);
		}
	}

	public function getDeleteProduct($id)
	{
		$row = Product::find($id);
		return view('admin.delete_product', compact('row'));
	}

	public function postDeleteProduct(Request $request)
	{
		try {
			$pr = Product::find($request->id);
			$pr->delete();

			return redirect()->route('admin')->with(['success' => 'Xoá sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['fail' => 'Xoá sản phẩm thất bại']);
		}
	}

	public function postAddType(Request $request)
	{
		try {
			$type = ProductType::all();

			$pr = new ProductType();
			$pr->name = $request->name;

			$pr->created_at = Carbon::now()->format('Y-m-d');
			$pr->updated_at = Carbon::now()->format('Y-m-d');

			$pr->save();

			return redirect()->back()->with(['type' => $type, 'success' => 'Thêm loại sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['type' => $type, 'fail' => 'Thêm loại sản phẩm thất bại']);
		}
	}

	public function getDeleteType($id)
	{
		$row = ProductType::find($id);
		return view('admin.delete_type', compact('row'));
	}

	public function postDeleteType(Request $request)
	{
		try {
			$pr = ProductType::find($request->id);
			$pr->delete();

			return redirect()->route('adminType')->with(['success' => 'Xoá loại sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['fail' => 'Xoá loại sản phẩm thất bại']);
		}
	}

	public function getUpdateType($id)
	{
		$row = ProductType::find($id);
		return view('admin.update_type', compact('row'));
	}

	public function postUpdateType(Request $request)
	{
		try {
			$pr = ProductType::find($request->id);
			
			if($request->name) 
			$pr->name = $request->name;

			$pr->save();
			return redirect()->route('adminType')->with(['success' => 'Sửa loại sản phẩm thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['fail' => 'Sửa loại sản phẩm thất bại']);
		}
	}

	public function postAddUser(Request $request)
	{
		try {
			$cus = Customer::all();

			$customer = new Customer();
			$customer->username = $request->username;
			$customer->password = $request->password;
			$customer->name = $request->name;
			$customer->address = $request->address;
			$customer->phone = $request->phone;
			$customer->created_at = Carbon::now()->format('Y-m-d');
			$customer->updated_at = Carbon::now()->format('Y-m-d');
			$customer->save();

			return redirect()->back()->with(['cus' => $cus, 'success' => 'Thêm người dùng thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['cus' => $cus, 'fail' => 'Thêm người dùng thất bại']);
		}
	}

	public function getUpdateUser($id)
	{
		$row = Customer::find($id);
		return view('admin.update_user', compact('row'));
	}

	public function postUpdateUser(Request $request)
	{
		try {
			$pr = Customer::find($request->id);

			if($request->username) 
			$pr->username = $request->username;
			
			if($request->password) 
			$pr->password = $request->password;
			
			if($request->name)	
			$pr->name = $request->name;
			
			if($request->address)	
			$pr->address = $request->address;
			
			if($request->phone) 
			$pr->phone = $request->phone;

			$pr->save();
			return redirect()->route('adminUser')->with(['success' => 'Sửa thành công']);
		} catch (Exception $e) {
			return redirect()->back()->with(['fail' => 'Sửa thất bại']);
		}
	}
}

