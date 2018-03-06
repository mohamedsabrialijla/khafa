<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return 'ssss';
//        return view('home');
        //return $this->ordinal(101);
    }

//    public function ordinal($num)
//    {
//        // Special case "teenth"
//        if (($num / 10) % 10 != 1) {
//            // Handle 1st, 2nd, 3rd
//            switch ($num % 10) {
//                case 1:
//                    return $num . 'st';
//                case 2:
//                    return $num . 'nd';
//                case 3:
//                    return $num . 'rd';
//            }
//        }
//        // Everything else is "nth"
//        return $num . 'th';
//    }
//    public function test()
//    {
//        $courses = Course::all();
////        foreach ($courses as $course){
////            $course->slug = str_replace(' ','-',$course->title);
////            $course->save();
////        }
//        return $courses;
//    }
}
