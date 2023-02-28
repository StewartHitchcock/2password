<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::all();

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
            'name' => 'required',
            'website' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd($request);
        Record::create($request->all());

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

        $records = Record::all();

        return view('records.index')->with('records', $records);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record = Record::find($record->id);

        $record->delete();

        $records = Record::all();

        return redirect('/record')->with('records', $records);
    }
}
