<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;

class UserCourseController extends Controller
{
    public function index($user_id)
    {
        $courses = Course::get()->where('user_id',$user_id);
        if(is_null($courses)){
            return response()->json('Data not found',404);
        }
        return response()->json($courses);
    }
}
