<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function create(Request $request)
    {
        $data = $request->only([
            'fullName',
            'phoneNumber',
            'city'
        ]);

        $result = ['status' => 201];

        try {
            $result['data'] = $this->studentService->saveStudentData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->studentService->getAllStudentData();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only([
            'fullName',
            'phoneNumber',
            'city'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->studentService->updateStudentData($data, $uuid);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function destroy($uuid)
    {
        $result = ['status' => 200];

        try {
            $this->studentService->deleteStudentData($uuid);
            $result['data'] = [
                'message' => 'Record deleted'
            ];
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
