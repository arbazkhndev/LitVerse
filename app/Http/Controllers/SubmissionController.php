<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Competition;
use App\Models\User;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        // ✅ Show all submissions with related user & competition
        $submissions = Submission::with(['user', 'competition'])->latest()->get();
        return view('dashboard.submissions', compact('submissions'));
    }

    public function create()
    {
        // ✅ Load competitions and users for dropdowns
        $competitions = Competition::all();
        $users = User::all();
        return view('dashboard.addSubmission', compact('competitions', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'competition_id' => 'required|exists:competitions,id',
            'content' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        Submission::create($request->all());

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully.');
    }

    public function edit($id)
    {
        $submission = Submission::findOrFail($id);
        $competitions = Competition::all();
        $users = User::all();
        return view('dashboard.editSubmission', compact('submission', 'competitions', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'competition_id' => 'required|exists:competitions,id',
            'content' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $submission = Submission::findOrFail($id);
        $submission->update($request->all());

        return redirect()->route('submissions.index')->with('success', 'Submission updated successfully.');
    }

    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->delete();

        return redirect()->route('submissions.index')->with('success', 'Submission deleted successfully.');
    }
}
