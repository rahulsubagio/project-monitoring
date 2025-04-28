<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $progress_filter = $request->query('progress_filter'); // "all", "completed", "in_progress"
        $sort_order = $request->query('sort_order'); // "latest" or "oldest"

        $projects = Project::query()
            ->when($search, function ($query) use ($search) {
                $query->where('project_name', 'like', "%{$search}%")
                    ->orWhere('client', 'like', "%{$search}%")
                    ->orWhere('project_leader', 'like', "%{$search}%");
            })
            ->when($progress_filter, function ($query) use ($progress_filter) {
                if ($progress_filter === 'completed') {
                    $query->where('progress', 100);
                } elseif ($progress_filter === 'in_progress') {
                    $query->where('progress', '<', 100);
                }
            })
            ->when($sort_order, function ($query) use ($sort_order) {
                if ($sort_order === 'oldest') {
                    $query->orderBy('start_date', 'asc');
                } else {
                    $query->orderBy('start_date', 'desc'); // default latest
                }
            }, function ($query) {
                $query->orderBy('start_date', 'desc'); // default kalau sort_order kosong
            })
            ->paginate(3)
            ->appends([
                'search' => $search,
                'progress_filter' => $progress_filter,
                'sort_order' => $sort_order
            ]);

        return view('projects.index', ['title' => 'Dashboard'], compact('projects', 'search', 'progress_filter', 'sort_order'));
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
        // dd($request->all());

        $validated = $request->validate([
            'project_name'      => 'required',
            'client'            => 'required',
            'project_leader'    => 'required',
            'leader_email'      => 'required|email',
            'start_date'        => 'required|string',
            'end_date'          => 'required|string',
            'progress'          => 'required|integer|min:0|max:100',
            'leader_photo'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('leader_photo')) {
            $validated['leader_photo'] = $request->file('leader_photo')->store('photos', 'public');
        }

        $validated['start_date'] = Carbon::createFromFormat('m/d/Y', $validated['start_date'])->format('Y-m-d');
        $validated['end_date'] = Carbon::createFromFormat('m/d/Y', $validated['end_date'])->format('Y-m-d');

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
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

        $validated['start_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $validated['start_date'])->format('Y-m-d');
        $validated['end_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $validated['end_date'])->format('Y-m-d');

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
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
