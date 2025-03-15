<?php

namespace App\Http\Controllers;

use App\Models\SportClass;
use Illuminate\Http\Request;

class SportClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("sportclasses/index", ["sport_classes" => SportClass::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sportclasses/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sport_classes|max:255',
        ]);

        $sportClass = new SportClass;
        $sportClass->name = $validated['name'];
        $sportClass->save();

        $request->session()->flash('status', 'Task was successful!');

        return redirect('/sport-classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: Validate
        return SportClass::where('id', $id)->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // TODO: Validate ID
        return view("sportclasses/edit", ["sport_class" => SportClass::where('id', $id)->firstOrFail()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Validate ID & Request
        $sportClass = SportClass::find($id);

        if (empty($sportClass)) {
            abort(404);
        }

        $sportClass->update($request->all());

        return redirect('/sport-classes.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sportClass = SportClass::find($id);

        if (empty($sportClass)) {
            abort(404);
        }

        $sportClass->delete();


        return redirect('/sport-classes');
    }
}
