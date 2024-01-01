<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Jobs\NotifyManagerJob;
use App\Models\Chat;
use App\Models\Manager;
use App\Models\Message;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatBoxController extends Controller
{

    public function index($projectId)
    {
      
    //    $messages = Message::whereDate('created_at', now()->toDateString())->get();
    
    //     foreach ($messages as $message) {
            
    //         $managers = Manager::where('id', '!=', $message->manager_id)
    //             ->whereHas('projects', function ($query) use ($message) {
    //                 $query->where('id','!=', $message->project_id);
    //             })
    //             ->get();
    
    //             dd($managers);
    //         foreach ($managers as $manager) {
    //            dd($manager);
    //         }
    //     }
    //     dd("fix");

        $project = Project::findOrFail($projectId);
        $managerId = auth('manager')->user()->id;
        $messages = Message::with('manager')->orderBy('id', 'ASC')->get();

        return view('admin.chat', compact('messages', 'project'));
    }


    public function sendMessage(SendMessageRequest $request, $projectId)
    {
        $validatedData = $request->validated();
        if (!empty($validatedData)) {
            if (auth('manager')->check()) {
                $validatedData['manager_id'] = auth('manager')->user()->id;
            }

            if (!empty($request->hasFile('image_path'))) {
                $image = $request->File('image_path');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path("uploads/images/"), $imageName);
                $validatedData['image_path'] = $imageName;
            }

            if (!empty($request->hasFile('video_path'))) {
                $video = $request->File('video_path');
                $videoName = time() . "." . $video->getClientOriginalExtension();
                $video->move(public_path("uploads/video/"), $videoName);
                $validatedData['video_path'] = $videoName;
            }

        }
        Message::create($validatedData);
        return redirect()->route('chatbox.index', ['projectId' => $projectId]);



    }
}
