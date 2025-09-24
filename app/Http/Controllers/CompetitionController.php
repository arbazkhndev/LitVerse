<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        // ✅ List all competitions
        $competitions = Competition::latest()->get();
        return view('dashboard.competitions', compact('competitions'));
    }

    public function create()
    {
        // ✅ Show create form
        return view('dashboard.addCompetition');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'rules' => 'nullable|string',
            'prize' => 'nullable|string',
        ]);

        Competition::create($request->all());

        return redirect()->route('competitions.index')->with('success', 'Competition created successfully.');
    }

    public function edit($id)
    {
        $competition = Competition::findOrFail($id);
        return view('dashboard.editCompetition', compact('competition'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'rules' => 'nullable|string',
            'prize' => 'nullable|string',
        ]);

        $competition = Competition::findOrFail($id);
        $competition->update($request->all());

        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully.');
    }

    public function destroy($id)
    {
        $competition = Competition::findOrFail($id);
        $competition->delete();

        return redirect()->route('competitions.index')->with('success', 'Competition deleted successfully.');
    }
}
