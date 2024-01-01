<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = auth('admin')->user()->managers()->get();
        return view('admin.manager.list',compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagerRequest $request)
    {
        $validatedData = $request->validated();
        if(!empty($validatedData)){
            if(auth('admin')->check()){
              $admin = auth('admin')->user();
            }
            if(!empty($request->hasFile('image'))){
                $image = $request->file('image');
                $imageName = time().".".$image->getClientOriginalExtension();
                $image->move(public_path("images/manager/"),$imageName);
                $validatedData['image'] = $imageName;
            }
             $admin->managers()->create($validatedData);
             flash()->addSuccess('Successfully added the manager');
             return redirect()->route('managers.index');
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
       $manager = Manager::findOrFail($id);
       return view("admin.manager.edit",compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManagerRequest $request, string $id)
    {
       $manager = Manager::findOrFail($id);
       $validatedData = $request->validated();


        if(!empty($validatedData)){
            if(auth('admin')->check()){
              $admin = auth('admin')->user();
              $validatedData['admin_id'] = $admin->id;
            }

            if(!empty($request->hasFile('image'))){
                $image = $request->file('image');
                $imageName = time().".".$image->getClientOriginalExtension();
                $image->move(public_path("images/manager/"),$imageName);
    
                $validatedData['image'] = $imageName;
            }else{
                $validatedData['image'] = $request->existingImage;

            }
            $manager->update($validatedData);
             flash()->addSuccess('Successfully updated the manager');
             return redirect()->route('managers.index');
        }
       
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manager = Manager::findOrFail($id);
        $manager->delete();
        flash()->addSuccess('Successfully deleted the manager');
        return redirect()->route('managers.index');
    }
}
