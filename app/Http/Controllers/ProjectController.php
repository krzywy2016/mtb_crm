<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('clients')->get();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $clients = Client::get();
        $mode = 'create';
        return view('project.create', compact('project', 'clients', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request, $id = null)
    {
        if ($id) {
            $project = Project::find($id);
            if (!$project) {
                abort(404);
            }
        } else {
            $project = new Project();
        }

        $project = new Project();
        $project->name = $request->input('name');
        $project->deadline = $request->input('deadline');
        $project->description = $request->input('description');
        $project->save();

        if ($request->has('client_id') && is_array($request->input('client_id')) && !in_array(null, $request->input('client_id'), true)) {
            $clientIds = $request->input('client_id');
            $filteredClientIds = array_filter($clientIds, function ($clientId) {
                return $clientId !== null;
            });
            $project->clients()->attach($filteredClientIds);
        }

        Session::flash('success_message', 'Dane zostały zapisane');

        return redirect()->route('project-edit', $project->id);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            abort(404);
        }

        $project->name = $request->input('name');
        $project->deadline = $request->input('deadline');
        $project->description = $request->input('description');

        $project->logo = $request->input('logo');

        $project->save();

        if ($request->has('client_id') && is_array($request->input('client_id')) && !in_array(null, $request->input('client_id'), true)) {
            $clientIds = $request->input('client_id');
            $filteredClientIds = array_filter($clientIds, function ($clientId) {
                return $clientId !== null;
            });
            $project->clients()->sync($filteredClientIds);
        } else {
            $project->clients()->detach();
        }

        Session::flash('success_message', 'Dane zostały zaktualizowane');

        return redirect()->route('project-show', $project->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $clients = Client::get();
        $mode = 'edit';
        return view('project.edit', compact('project', 'clients', 'mode'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $project->delete();
        return back();
    }

    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }

        $clients = $project->clients;

        return view('project.show', compact('project', 'clients'));
    }
}
