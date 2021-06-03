<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Exam;
use App\Http\Requests;
use App\Question;
use App\Result;
use App\Topic;
use App\Test;
use App\TopicsUser;
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


    public function renderStudentDashboard()
    {
        $announcements = DB::table('announcements as a')
            ->join('users', 'a.user_id', '=', 'users.id')
            ->select('a.*', 'users.name', 'users.email')
            ->take(3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $exams = DB::table('exams as e')
            ->join('topics', 'e.topic_id', '=', 'topics.id')
            ->join('topics_users as tu', 'tu.topic_id', '=', 'topics.id')
            ->whereNull('e.deleted_at')
            ->where('status', 'open')
            ->where('tu.user_id', '=', Auth::user()->id)
            ->select('e.*', 'topics.title', 'tu.user_id')
            ->take(5)
            ->distinct()
            ->get();

        return view('home_student', compact('announcements', 'exams'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isAdmin = Auth::user()->isAdmin();

        if (!$isAdmin) {
            return $this->renderStudentDashboard();
        }

        $announcements = DB::table('announcements as a')
            ->join('users', 'a.user_id', '=', 'users.id')
            ->select('a.*', 'users.name', 'users.email')
            ->take(3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $users = User::orderBy('created_at', 'DESC')->take(5)->get();

        $exams = DB::table('exams as e')
            ->join('topics', 'e.topic_id', '=', 'topics.id')
            ->select('e.*', 'topics.title')
            ->whereNull('e.deleted_at')
            ->where('status', 'open')
            ->take(5)
            ->get();

        return view('home', compact('questions', 'students', 'faculty', 'quizzes', 'average', 'topics', 'isAdmin', 'announcements', 'users', 'exams'));
    }
}
