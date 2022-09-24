<?php

namespace App\Http\Controllers\API\admin;

use App\Models\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CrudUserController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $users = User::query();

        return ResponseFormatter::success(
            $users->paginate($limit),
            'Data list user berhasil diambil'
        );
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete($request->all());

        return ResponseFormatter::success($user, 'Berhasil menghapus data User');
    }
}
