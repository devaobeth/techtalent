<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Validator;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile.index')
            ->with([
                'user' => auth()->user()
            ]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],
            'password' => ['nullable','string', 'min:8'],
            'old_password' => [
                'required_with:password', function ($attribute, $value, $fail) use($request) {
                    if (!Hash::check($value, auth()->user()->password) && !empty($request->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
        ]);
        if($validator->fails()){
            return back()->withInput()
                ->withErrors($validator);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if (!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
       $user =  User::where(['id' => auth()->user()->id])
            ->update($data);
        if ($user){
            return back();
        }
    }
}
