<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;
use Throwable;

class JurusanController extends Controller
{
    public function index()
    {
        $data['title'] = 'Filter by Jurusan';
        $data['page'] = 'filter-by-jurusan';
        $data['auth'] = auth()->user();

        $data['userCount'] = User::where('role', 'user')->count();
        $data['user'] = User::where('role', 'user')
            ->latest()
            ->filter(request(['minat_jurusan']))
            ->paginate(10);

        return view('pages.jurusan.index', $data);
    }
}
