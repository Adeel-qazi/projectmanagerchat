<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequst;
use App\Http\Requests\UpdateProjectRequst;
use App\Models\Manager;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
        if(auth('admin')->check()){
            $projects = Project::with('manager')->get();
        }else{
            // $projects = auth('manager')->user()->projects;
            $projects = Project::all();
        }
         return view('admin.project.list',compact('projects'));
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
        // $this->authorize('create',Project::class);//right
       
         return view('admin.project.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(StoreProjectRequst $request)
     {

         $validatedData = $request->validated();
         
         if(!empty($validatedData)){

             if(auth('manager')->check()){
                 $manager = auth('manager')->user();
                }
                if(!empty($request->hasFile('image'))){
                    $image = $request->file('image');
                    $imageName = time().".".$image->getClientOriginalExtension();
                    $image->move(public_path("images/project/"),$imageName);
                    $validatedData['image'] = $imageName;
                }
                $manager->projects()->create($validatedData);
              flash()->addSuccess('Successfully added the project');
              return redirect()->route('projects.index');
         }
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
     public function edit(string $id)
     {
        $project = Project::findOrFail($id);
        // $this->authorize('update',Project::class);//right

        return view("admin.project.edit",compact('project'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequst $request, string $id)
    {
       
        $Project = Project::findOrFail($id);
        
        
        $validatedData = $request->validated();
        if(!empty($validatedData)){
            if(auth('manager')->check()){
                $manager = auth('manager')->user();
                $validatedData['manager_id'] = $manager->id;
            }
            if(!empty($request->hasFile('image'))){
                $image = $request->file('image');
                $imageName = time().".".$image->getClientOriginalExtension();
                $image->move(public_path("images/project/"),$imageName);
    
                $validatedData['image'] = $imageName;
            }else{
                $validatedData['image'] = $request->existingImage;

            }
            $Project->update($validatedData);
              flash()->addSuccess('Successfully updated the Project');
              return redirect()->route('projects.index');
         }
        
         //
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $Project = Project::findOrFail($id);
         $Project->delete();
         flash()->addSuccess('Successfully deleted the Project');
         return redirect()->route('projects.index');
     }
}
