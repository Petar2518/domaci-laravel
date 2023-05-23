<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CourseCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return new CourseCollection($courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'title' =>'required|string|max:255',
            'level' =>'required|string|max:150',
            'description' => 'required|string|max:255',
            'language_id'=>'required'
        ]);

        if ($validator->fails())
        return response()->json($validator->errors());

        $course= Course::create([
            'title' => $request->title,
            'level' => $request->level,
            'description' =>$request->description,
            // 'language'=>$request->language,
            'language_id'=>$request->language_id,
            'user_id' =>Auth::user()->id
        ]);
        return response()->json(['Course added successfully.', new CourseResource($course)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(),[
            'title' =>'required|string|max:255',
            'level' =>'required|string|max:150',
            'description' => 'required|string|max:255',
            'language_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $course->title = $request->title;
        $course->level = $request->level;
        $course->description =$request->description;
        $course->language_id =$request->language_id;

        $course->save();

        return response()->json(['Course is updated succesfully.', new CourseResource($course)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json('Course is deleted successfuly!');
    }
}
