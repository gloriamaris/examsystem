<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Http\Requests\StoreAnnouncementsRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateAnnouncementsRequest;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of Announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $name = Auth::user()->name;
        $email = Auth::user()->email;

        return view('announcements.index', compact('announcements', 'name', 'email'));
    }

    /**
     * Show the form for creating new Announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created Announcement in storage.
     *
     * @param  \App\Http\Requests\StoreAnnouncementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncementsRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['description'] = trim($data['description']);

        Announcement::create($data);

        return redirect()->route('announcements.index');
    }


    /**
     * Show the form for editing Announcement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update Announcement in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnouncementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncementsRequest $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->all());

        return redirect()->route('announcements.index');
    }


    /**
     * Display Announcement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('announcements.show', compact('announcement'));
    }


    /**
     * Remove Announcement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index');
    }

    /**
     * Delete all selected Announcement at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Announcement::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
