<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTopicsUsersRequest;
use App\Http\Requests\UpdateTopicsUsersRequest;
use App\Topic;
use App\TopicsUser;
use App\User;
use Illuminate\Support\Facades\DB;

class TopicsUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of TopicsUser.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = TopicsUser::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new TopicsUser.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students = DB::table('users as u')
            ->leftJoin('topics_users', 'u.id', '=', 'topics_users.user_id')
            ->where('role_id', '>', 1)
            ->get();

        $semesters = [
            'AY ' . date('Y') . ' - ' . date('Y', strtotime('+1 year')) . ', 1st Semester',
            'AY ' . date('Y') . ' - ' . date('Y', strtotime('+1 year')) . ', 2nd Semester',
            'AY ' . date('Y', strtotime('+1 year')) . ' - ' . date('Y', strtotime('+2 years')) . ', 1st Semester',
            'AY ' . date('Y', strtotime('+1 year')) . ' - ' . date('Y', strtotime('+2 years')) . ', 2nd Semester'
        ];

        return view('topics_users.create', compact('students', 'semesters'));
    }

    /**
     * Store a newly created TopicsUser in storage.
     *
     * @param  \App\Http\Requests\StoreTopicsUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicsUsersRequest $request)
    {
        TopicsUser::create($request->all());

        return redirect()->route('roles.index');
    }


    /**
     * Show the form for editing TopicsUser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($topicId)
    {
        $topic = Topic::findOrFail($topicId);
        $enrolledStudents = TopicsUser::where('topic_id', '=', $topicId)->get();

        $students = [];
        $count = -1;

        $students = User::where('role_id', '>', 1)->get();
        $newStudents = [];

        if (count($enrolledStudents) > 0) {
            foreach ($students as $student) {
                array_push($newStudents, $student);

                foreach ($enrolledStudents as $enrolled) {
                    if ($student->id == $enrolled->user_id) {
                        array_pop($newStudents);
                    }
                }
            }

            $students = $newStudents;
        }


        $semesters = [
            'AY ' . date('Y') . ' - ' . date('Y', strtotime('+1 year')) . ', 1st Semester',
            'AY ' . date('Y') . ' - ' . date('Y', strtotime('+1 year')) . ', 2nd Semester',
            'AY ' . date('Y', strtotime('+1 year')) . ' - ' . date('Y', strtotime('+2 years')) . ', 1st Semester',
            'AY ' . date('Y', strtotime('+1 year')) . ' - ' . date('Y', strtotime('+2 years')) . ', 2nd Semester'
        ];

        return view('topics_users.edit', compact('students', 'semesters', 'topic', 'enrolled'));
    }

    /**
     * Actually, enroll students in a course,
     * insert into TopicUser.
     *
     * @param  \App\Http\Requests\UpdateTopicsUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicsUsersRequest $request, $topicId)
    {
        TopicsUser::create($request->all());
        return redirect()->route('courses.show', $topicId);
    }


    /**
     * Display TopicsUser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($topicId)
    {
        $students = DB::table('users as u')
            ->join('topics_users', 'u.id', '=', 'topics_users.user_id')
            ->where([
                ['role_id', '>', 1],
                ['topics_users.topic_id', '=', $topicId],
            ])
            ->whereNull('topics_users.deleted_at')
            ->select('u.name', 'u.email', 'topics_users.semester', 'topics_users.id')
            ->get();

        $topic = Topic::findOrFail($topicId);

        return view('topics_users.manage', compact('topic', 'students'));
    }


    /**
     * Remove TopicsUser from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = TopicsUser::findOrFail($id);
        $topicId = $student->topic_id;
        $student->delete();

        return redirect()->route('courses.show', $topicId);
    }

    /**
     * Delete all selected TopicsUser at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = TopicsUser::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
