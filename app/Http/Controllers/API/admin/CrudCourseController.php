<?php

namespace App\Http\Controllers\API\admin;

use Exception;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class CrudCourseController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 1000);
        $courses = Course::query();

        return ResponseFormatter::success(
            $courses->paginate($limit),
            'Data list course berhasil diambil'
        );
    }

    public function store(Request $request)
    {
        try {
            $course = Course::create([
                'name' => $request->name,
                'status' => $request->status,
                'price' => $request->price,
                'category' => $request->category,
                'level' => $request->level,
            ]);

            return ResponseFormatter::success($course, 'Data Course berhasil dibuat');

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Data course gagal dibuat', 404);
        }
    }

    public function edit($id)
    {
        if ($id) {
            $course = Course::find($id);

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
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return ResponseFormatter::success($course, 'Data Course berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->delete($request->all());

        return ResponseFormatter::success($course, 'Berhasil menghapus data Course');
    }
}
