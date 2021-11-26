<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Customer;
use Carbon\Carbon;
use FFI\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class PagesController extends Controller
{
	public function getLogin()
	{
		$all_type = ProductType::all();

		if (Auth::check()) {
			return redirect('home');
		} else {
			return view('pages.login', compact('all_type'));
		}
	}

	public function getLogout(Request $request)
	{
		$all_type = ProductType::all();
		session()->forget('name');
		return view('pages.login',compact('all_type'));
	}

	public function postLogin(Request $request)
	{
		try {

			$user = $request->username;
			$pass = $request->password;

			$find = Customer::where('username', '=', $user)->where('password', '=', $pass)->count();
			if ($find > 0) {
				session()->put('name', $user);
				session()->flash('success', $user);
				if ($user == 'admin') return redirect('admin');
				return redirect('');
			} else	{
				session()->flash('error', 'Sai tên người dùng hoặc mật khẩu');
				return redirect()->back();
			}
		} catch (Exception $e) {
			response()->json(["message" => "fail", "status" => "fail"], Response::HTTP_OK);
		}
	}

	public function getResgister()
    {
        $all_type = ProductType::all();

        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('pages.resgister', compact('all_type'));
        }
    }
    public function message(Request $request)
    {
        $validate = [
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'name' => 'required|min:6',
            'address' => 'required|min:6',
            'phone' => 'required|min:10',
        ];
        $message = [
            'username.required' => 'Bạn phải nhập username !',
            'username.min' => 'Bạn phải nhập username ít nhất 6 ký tự !',
            'password.required' => 'Bạn phải nhập password !',
            'password.min' => 'Bạn phải nhập password ít nhất 6 ký tự !',
            'name.required' => 'Bạn phải nhập name !',
            'name.min' => 'Bạn phải nhập name ít nhất 6 ký tự !',
            'address.required' => 'Bạn phải nhập address !',
            'address.min' => 'Bạn phải nhập address ít nhất 6 ký tự !',
            'phone.required' => 'Bạn phải nhập phone !',
            'phone.min' => 'Bạn phải nhập phone ít nhất 6 ký tự !',
        ];
        $request->validate($validate, $message);
    }
    public function postResgister(Request $request)
    {
        try {
            $customer=new Customer();
            $this->message($request);
            $customer->username=$request->username;
            $customer->password=$request->password;
            $customer->name=$request->name;
            $customer->address=$request->address;
            $customer->phone=$request->phone;
            $customer->created_at = Carbon::now()->format('Y-m-d');
            $customer->updated_at = Carbon::now()->format('Y-m-d');
            $customer->save();
            return redirect()->back()->with("success", "Đăng ký thành công !");
        } catch (Exception $e) {
//            return redirect()->back()->with($this->message($request));
//            return redirect('layouts.index')->back();
            return redirect('layouts.index')->back()->with($this->message($request));
        }
    }

	public function getHome()
	{
		$product = Product::all();
		$newestProduct = Product::orderBy('created_at', 'desc')->get();
		$random1 = Product::inRandomOrder()->limit(1)->get();
		$random2 = Product::inRandomOrder()->limit(1)->get();
		$random3 = Product::inRandomOrder()->limit(1)->get();
		$result_2cake = Product::inRandomOrder()->limit(2)->get();
		$type = ProductType::where('id', '>', '0')->take(3)->get();

		$type1 = Product::where('id_type', '=', '1')->limit(4)->get();
		$type2 = Product::where('id_type', '=', '2')->limit(4)->get();
		$type3 = Product::where('id_type', '=', '4')->limit(4)->get();

		$all_type = ProductType::all();
		return view('pages.index', compact('product', 'newestProduct', 'random1', 'random2', 'random3', 'result_2cake', 'all_type', 'type1', 'type2', 'type3'));
	}

	public function getAdmin() {
		$product = Product::all();
		return view('admin.admin', compact('product'));
	}
	public function getAdminType() {
		$type = ProductType::all();
		return view('admin.admin_type', compact('type'));
	}
	public function getAdminUser() {
		$cus = Customer::all();
		return view('admin.admin_user', compact('cus'));
	}

	public function getProduct()
	{
		$all_type = ProductType::all();

		$all = Product::all();
		$num = count($all);
		$product = Product::where('id', '>', '0')->paginate(8);

		$sortproduct = Product::orderBy('price', 'asc')->paginate(8);

		return view('pages.product', compact('product', 'all', 'sortproduct', 'num', 'all_type'));
	}

	public function getProductDetail($id)
	{
		$all_type = ProductType::all();

		$product = Product::find($id);
		$sp_tuongtu = Product::where('id_type', $product->id_type)->paginate(4);
		return view('pages.product_detail', compact('all_type', 'product', 'sp_tuongtu'));
	}

	public function postSearch(Request $request)
	{
		$all_type = ProductType::all();

		$keyword = $request->keyword;
		$ketqua = Product::where('name', 'like', "%$keyword%")->orWhere('price', $keyword)->paginate(8);
		$num = Product::where('name', 'like', "%$keyword%")->orWhere('price', $keyword)->count();
		return view('pages.search', compact('keyword', 'ketqua', 'num', 'all_type'));
	}

	public function postSearchAd(Request $request)
	{
		$keyword = $request->keyword;
		$ketqua = Product::where('name', 'like', "%$keyword%")->orWhere('price', $keyword)->get();
		return view('admin.search_admin', compact('keyword', 'ketqua'));
	}


	public function getTypeProduct($type)
	{
		$all_type = ProductType::all();

		$sp_theoloai = Product::where('id_type', $type)->get();
		$num = Product::where('id_type', $type)->count();
		$sp_khac = Product::where('id_type', '<>', $type)->paginate(8);
		$loai = ProductType::all();
		$tenloai = ProductType::where('id', $type)->first();
		return view('pages.type_product', compact('all_type', 'sp_theoloai', 'sp_khac', 'loai', 'tenloai', 'num'));
	}



}
