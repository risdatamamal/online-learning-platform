<?php

namespace App\Http\Controllers\API\admin;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_users' => User::all()->count(),
            'total_courses' => Course::all()->count(),
            'total_course_free' => Course::where('price', 0)->count(),
        ];

        return ResponseFormatter::success(
            $data,
            'Data berhasil diambil'
        );
    }
}
