<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $page = $request->query('page', null);
        $allStudent = Student::all(); 

        return response()->json([
            'page'=> $page,
            'total-student'=> sizeof($allStudent),
            'students'=> $allStudent,
        ]);
    }

    /**
     * Display a single index.
     */
    public function singleIndex(Request $request): JsonResponse
    {
        $id = $request->id ;
        $allStudent = Student::all(); 

        return response()->json([
            'message'=> 'Success',
            'student'=> $allStudent[$id - 1],
        ]);
    }
    
    /**
     * Display a single index.
     */
    public function field(Request $request): JsonResponse
    {
        $id = $request->id;
        $field = $request->field;
        $allStudent = Student::all(); 

        return response()->json([
            $allStudent[$id - 1][$field],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): JsonResponse
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $userAgent = $request->header('User-Agent');
        $page = $request->query('page');
        $remember_token = $request->cookie('remember-token', null);

        $avatar = $request->file('avatar');
        $avatarName = $avatar->getClientOriginalName();
        $avatar->move(public_path('/uploads'), $avatarName);

        return response()->json([
            'page'=> $page,
            'name'=> $name,
            'age'=> $age,
            'avatar'=> $avatarName,
            'user-agent'=> $userAgent,
            'remember_token'=> $remember_token,
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function setCookie(Request $request): JsonResponse
    {
        $name = 'remember_token';
        $value = 'my value';
        $minutes = 60;
        $path = '/';
        $domim = $_SERVER['SERVER_NAME'];
        $secure = true;
        $httpOnly = false;

        $remember_token = $request->cookie('remember_token', null);

        return response()->json([
            'success'=> true,
            'cookie'=> $name,
            'remember_token'=> $remember_token,
        ])->cookie(
            $name, $value, $minutes, $path, $domim, $secure, $httpOnly
        );
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}