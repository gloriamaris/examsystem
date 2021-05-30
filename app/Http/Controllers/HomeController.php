<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Http\Requests;
use App\Question;
use App\Result;
use App\Topic;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isAdmin = Auth::user()->isAdmin();
        $announcements = DB::table('announcements as a')
            ->join('users', 'a.user_id', '=', 'users.id')
            ->select('a.*', 'users.name', 'users.email')
            ->take(3)
            ->get();
        $topics = Topic::count();
        $questions = Question::count();
        $students = User::where('role_id', '=', 2)->count();
        $faculty = User::where('role_id', '=', 1)->count();
        $quizzes = Test::count();
        $average = Test::avg('result');

        return view('home', compact('questions', 'students', 'faculty', 'quizzes', 'average', 'topics', 'isAdmin', 'announcements'));
    }
}
