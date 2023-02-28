<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Auth;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $records = Record::where('user_id', $userId)->get();

        return view('records.index')
        ->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255 ',
            'website' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        auth()->user()->records()->create($request->all())->save();

        return redirect('/record');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $request->validate([
            'name' => 'required',
            'website' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $record->update($request->all());

        $userId = Auth::user()->id;
        $records = Record::where('user_id', $userId)->get();

        return view('records.index')->with('records', $records);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record = Record::find($record->id);

        $record->delete();

        $userId = Auth::user()->id;
        $records = Record::where('user_id', $userId)->get();

        return redirect('/record')->with('records', $records);
    }
}
