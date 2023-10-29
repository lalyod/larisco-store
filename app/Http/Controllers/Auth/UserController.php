<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

        try{
            $provinces = Http::withHeaders([
                'key' => env('RAJAONGKIR_KEY')
            ])->get('https://api.rajaongkir.com/starter/province');
        }catch(Exception $ex){
            return redirect()->refresh();
        }
        
        return view('pages.home.settings', [
            "title" => "settings",
            'user' => $user,
            "provinces" => $provinces['rajaongkir']['results']
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,jpeg,png,svg',
            'name' => 'string|min:3|nullable',
            'email' => 'email|nullable',
            'phone_number' => 'string|min:1|nullable',
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
        } else {
            $user_model->update($validator->validated());
            return redirect()->back()->with('success', 'Berhasil update profile');
        }
    }
}
