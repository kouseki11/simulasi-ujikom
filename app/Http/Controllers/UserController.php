<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar User';
        $data['page'] = 'user';
        $data['auth'] = auth()->user();

        $data['userCount'] = User::where('role', 'user')->count();
        $data['user'] = User::where('role', 'user')
            ->latest()
            ->filter(request(['search']))
            ->paginate(2);

        return view('pages.user.index', $data);
    }


    public function create()
    {
        $data['title'] = 'Tambah User';
        $data['page'] = 'user';
        $data['auth'] = auth()->user();
        return view('pages.user.create', $data);
    }


    public function edit($id)
    {
        $data['schools'] = Http::get('https://api-buat-zaqi.akmal.tech/')->json();
        $data['page'] = 'user';
        $data['title'] = 'Edit User';
        $data['user'] = User::find($id);
        $data['auth'] = auth()->user();
        return view('pages.user.edit',  $data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $getNisn = ($request->nisn);
            $generatePassword = $getNisn;

            $validator = Validator::make($request->all(), [
                'nisn' => [
                    'required',
                    Rule::unique('user')->ignore($id),
                ],
                'name' => 'required',
                'school' => 'required',
                'phone_number' =>[
                    'required',
                    Rule::unique('user')->ignore($id),
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

            User::find($id)->update($data);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Data Berhasil Diedit');
        } catch (Throwable $e) {
            DB::rollback();
            Log::debug('UserController update() ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            User::find($id)->delete();
            DB::commit();
            return redirect()->route('pages.user.index')->with('success', 'Data Berhasil Dihapus');
        } catch (Throwable $e) {
            DB::rollback();
            Log::debug('UserController destroy() ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
