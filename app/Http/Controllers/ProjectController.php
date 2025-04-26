<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->search) {
            $query->where('project_name', 'like', '%' . $request->search . '%')
                ->orWhere('client', 'like', '%' . $request->search . '%')
                ->orWhere('project_leader', 'like', '%' . $request->search . '%');
        }

        if ($request->progress_filter) {
            $query->where('progress', $request->progress_filter);
        }

        $projects = $query->latest()->paginate(5);
        return view('projects.index', ['title' => 'Dashboard'], compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create', ['title' => 'New Project']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name'      => 'required',
            'client'            => 'required',
            'project_leader'    => 'required',
            'leader_email'      => 'required|email',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date',
            'progress'          => 'required|integer|min:0|max:100',
            'leader_photo'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('leader_photo')) {
            $validated['leader_photo'] = $request->file('leader_photo')->store('photos', 'public');
        }

        Project::create($validated);
        return redirect()->route('projects.index', ['title' => 'Dashboard'])->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['title' => 'Edit Project'], compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name'    => 'required',
            'client'          => 'required',
            'project_leader'  => 'required',
            'leader_email'    => 'required|email',
            'start_date'      => 'required|date',
            'end_date'        => 'required|date',
            'progress'        => 'required|integer|min:0|max:100',
            'leader_photo'    => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('leader_photo')) {
            if ($project->leader_photo) {
                Storage::disk('public')->delete($project->leader_photo);
            }
            $validated['leader_photo'] = $request->file('leader_photo')->store('photos', 'public');
        }

        $project->update($validated);
        return redirect()->route('projects.index', ['title' => 'Dashboard'])->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->leader_photo) {
            Storage::disk('public')->delete($project->leader_photo);
        }
        $project->delete();
        return redirect()->route('projects.index', ['title' => 'Dashboard'])->with('success', 'Project deleted successfully.');
    }
}
