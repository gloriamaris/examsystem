<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Test;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');

        if (!Auth::user()->isAdmin()) {
            $results = $results->where('user_id', '=', Auth::id());
        }

        return view('results.index', compact('results'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');
        $exam = Exam::where('exams.id', '=', $test->exam_id)
            ->join('topics', 'exams.topic_id', '=', 'topics.id')
            ->select('exams.*', 'topics.title')
            ->first();

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();

            $totalItems = count($results);
        }

        return view('results.show', compact('test', 'results', 'totalItems', 'exam'));
    }
}
