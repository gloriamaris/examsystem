<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\StoreExamsQuestionsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateExamsRequest;
use App\Question;
use App\QuestionsOption;
use App\Topic;
use Illuminate\Support\Facades\DB;

class ExamsQuestionsController extends Controller
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

        return view('exams_questions.index', compact('exams'));
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

        return view('exams_questions.create', compact('courses', 'statuses'));
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param  \App\Http\Requests\StoreExamsQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamsQuestionsRequest $request)
    {

        $examId = $request->exam_id;

        $question = Question::create($request->all());

        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'option') !== false && $value !== '') {
                $status =  $request->input('correct') == $key ? 1 : 0;

                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect()->route('exams.show', $examId);
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
        $topic = Topic::findOrFail($exam->topic_id);
        $options = [1, 2, 3, 4, 5];

        return view('exams_questions.create', compact('topic', 'exam', 'options'));
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
