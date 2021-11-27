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

class LoginController extends Controller
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
		return view('pages.login', compact('all_type'));
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
			} else {
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
			$customer = new Customer();
			$this->message($request);
			$customer->username = $request->username;
			$customer->password = $request->password;
			$customer->name = $request->name;
			$customer->address = $request->address;
			$customer->phone = $request->phone;
			$customer->created_at = Carbon::now()->format('Y-m-d');
			$customer->updated_at = Carbon::now()->format('Y-m-d');
			$customer->save();
			return redirect()->back()->with("success", "Đăng ký thành công !");
		} 
		catch (Exception $e) {
			return redirect('layouts.index')->back()->with($this->message($request));
		}
	}
}
