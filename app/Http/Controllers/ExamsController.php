<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExamsRequest;
use App\Http\Requests\UpdateExamsRequest;
use App\Topic;
use Illuminate\Support\Facades\DB;

class ExamsController extends Controller
{
    protected $statuses = ['open', 'closed'];

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of Exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = DB::table('exams as e')
            ->join('topics', 'e.topic_id', '=', 'topics.id')
            ->select('e.*', 'topics.title')
            ->whereNull('e.deleted_at')
            ->get();

        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating new Exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Topic::all();
        $statuses = $this->statuses;

        return view('exams.create', compact('courses', 'statuses'));
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param  \App\Http\Requests\StoreExamsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamsRequest $request)
    {
        Exam::create($request->all());

        return redirect()->route('exams.index');
    }


    /**
     * Show the form for editing Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $courses = Topic::all();
        $statuses = $this->statuses;

        return view('exams.edit', compact('exam', 'courses', 'statuses'));
    }

    /**
     * Update Exam in storage.
     *
     * @param  \App\Http\Requests\UpdateExamsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamsRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());

        return redirect()->route('exams.index');
    }


    /**
     * Display Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);

        return view('exams.show', compact('role'));
    }


    /**
     * Remove Exam from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        $exam->delete();

        return redirect()->route('exams.index');
    }

    /**
     * Delete all selected Exam at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Exam::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
