<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view("pages.auth.login", [
            'title' => 'login'
        ]);
    }

    public function register()
    {
        return view("pages.auth.register", [
            "title" => "register"
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $provinces = Province::all();
        return view('pages.home.settings', [
            "title" => "settings",
            'user' => $user,
            "provinces" => $provinces
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,jpeg,png,svg',
            'name' => 'string|min:3|nullable',
            'email' => 'email|nullable',
            'phone_number' => 'integer|min:1|nullable',
            'gender' => 'string|in:laki-laki,perempuan|nullable',
            'birth_date' => 'date|nullable'
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $user = Auth::user();
        $user_model = User::where('id', $user->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('/public/users', $image->hashName());

            Storage::delete('public/users/' . $user->image);

            $user_model->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date
            ]);

            return redirect()->back()->with('success', 'Behasil di update');
        } else if ($request->has('village')) {
            $data = array(
                "province" => $request->province,
                "regency" => $request->regency,
                "district" => $request->district,
                "village" => $request->village
            );

            $province = Province::where('id', $data['province'])->first();
            $regency = Regency::where('id', $data['regency'])->first();
            $district = District::where('id', $data['district'])->first();
            $village = Village::where('id', $data['village'])->first();

            $address = 'Provinsi ' . $province->name . ', ' . $regency->name . ', Kec ' . $district->name . ', Desa ' . $village->name;

            $user_model->update([
                "address" => $address
            ]);

            return redirect()->back()->with("success", "Berhasil menambah alamat");
        } else {
            $user_model->update($validator->validated());
            return redirect()->back()->with('success', 'Berhasil update profile');
        }
    }
}
