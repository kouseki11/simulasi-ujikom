<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Facades\Hash;
use PDF;

class RegisterController extends Controller
{
    public function index()
    {
        $schools = Http::get('https://api-buat-zaqi.akmal.tech/')->json();

        return view('pages.auth.register',[
            'schools' => $schools,
            'title' => 'Register'
        ]);
    }


    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            $getNisn = ($request->nisn);
            $generatePassword = $getNisn;

            $validator = Validator::make($request->all(), [
                'nisn' => [
                    'required',
                    Rule::unique('user', 'nisn'),
                ],
                'name' => 'required',
                'school' => 'required',
                'phone_number' =>[
                    'required',
                    Rule::unique('user', 'phone_number'),
                ],
                'minat_jurusan' => 'required',
                'gender' => 'required',
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            $data['password'] = bcrypt($generatePassword);
            $data['role'] = 'user';

            User::create($data);
            DB::commit();
            return redirect()->route('landing')->with('success', 'Berhasil Register');
        } catch (Throwable $e) {
            DB::rollback();
            Log::debug('RegisterController update() ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }


        // $request['nisn'] = bcrypt($request['nisn']);

        // $pdf = PDF::loadView('user.pdf',[
        //     'user' => User::latest()->first(),
        //     'nisn' => $request->nisn,
        // ]);

        // return redirect('/')->with('success', 'Registration successfull!');
        // return $pdf->download('PPDB-Wikrama.pdf');
        


        // return $pdf->stream('anjing.pdf');


    //    return redirect('/pdf')->with('success', 'Registration successfull! Please login');

    }

}
