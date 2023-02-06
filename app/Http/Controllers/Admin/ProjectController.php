<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all();
        return view('admin.projects.create',compact("types") );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            "type_id" => "required"
        ]);

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("projects", $data["cover_img"]);
        }
       
        $project = Project::create([
            ...$data,
            "user_id" => Auth::id(),
            "cover_img" => $path ?? ""
        ]);

        return redirect()->route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.show', compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();

        if(!$project){
            abort(404, " Project not found");
        }

        return view('admin.projects.edit', compact("project","types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $project = Project::findOrFail($id);

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("projects", $data["cover_img"]);
            Storage::delete($project->cover_img);
        }

        $project->update([
            ...$data,
            "cover_img" => $path ?? $project->cover_img
        ]);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        if ($project->cover_img) {
            Storage::delete($project->cover_img);
        }

        return redirect()->route("admin.projects.index");
    }
}
