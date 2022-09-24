<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 1000);
        $category = $request->input('category');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        // search berdasarkan id
        if ($id) {
            $course = Course::where('status', 'published')->find($id);

            if ($course) {
                return ResponseFormatter::success(
                    $course,
                    'Data course berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data course tidak ada',
                    404
                );
            }
        }

        $course = Course::query();

        if ($category) {
            $course->where('category', 'like', '%' . $category . '%');
        }

        if ($price_from) {
            $course->where('price', '>=', $price_from);
        }

        if ($price_to) {
            $course->where('price', '<=', $price_to);
        }

        return ResponseFormatter::success(
            $course->where('status', 'published')->paginate($limit),
            'Data list course berhasil diambil'
        );
    }

    public function search(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $name = $request->input('name');

        $course = Course::query();

        if ($name) {
            $course->where('name', 'like', '%' . $name . '%')->orderBy('name');
        }

        return ResponseFormatter::success(
            $course->where('status', 'published')->paginate($limit),
            'Data course yang disearch berhasil diambil'
        );
    }

    public function sortLowestPrice(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $course = Course::query();


        return ResponseFormatter::success(
            $course->where('status', 'published')->orderBy('price', 'ASC')->paginate($limit),
            'Data course yang disort berdasarkan harga terendah berhasil diambil'
        );
    }

    public function sortHighestPrice(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $course = Course::query();


        return ResponseFormatter::success(
            $course->where('status', 'published')->orderBy('price', 'DESC')->paginate($limit),
            'Data course yang disort berdasarkan harga terendah berhasil diambil'
        );
    }

    public function sortFree(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $course = Course::query();


        return ResponseFormatter::success(
            $course->where('status', 'published')->where('price', 0)->paginate($limit),
            'Data course yang disort berdasarkan harga terendah berhasil diambil'
        );
    }
}
