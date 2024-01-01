<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Determine whether the Manager can view any models.
     */
    public function viewAny(Manager $manager): bool
    {
        //
    }

    /**
     * Determine whether the Manager can view the model.
     */
    public function view(Manager $manager, Project $project): bool
    {
        //
    }

    /**
     * Determine whether the Manager can create models.
     */
    public function create()
    {   
        dd(auth()->id());
        return auth('manager')->id() > 1
        ? Response::allow()
        : Response::deny('You do not own this project.');
    }


    public function edit(Manager $manager): bool
    {
        
    }


    /**
     * Determine whether the Manager can update the model.
     */
    public function update(Manager $manager, Project $project): bool
    {
        return $manager->id === $project->manager_id;
    }

    /**
     * Determine whether the Manager can delete the model.
     */
    public function delete(Manager $manager, Project $project): bool
    {
        
    }

    /**
     * Determine whether the Manager can restore the model.
     */
    public function restore(Manager $manager, Project $project): bool
    {
        //
    }

    /**
     * Determine whether the Manager can permanently delete the model.
     */
    public function forceDelete(Manager $manager, Project $project): bool
    {
        //
    }
}
