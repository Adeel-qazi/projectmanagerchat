@extends('admin.layouts.master')

@section('content')
<div class="main-content">
    <section class="section">
      <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title m-b-0">Chat</h4>
        </li>
      </ul>
      <div class="section-body">
        <div class="row">
            {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div id="plist" class="people-list">
                          <div class="chat-search">
                            <input type="text" class="form-control" placeholder="Search..." />
                          </div>
                          <div class="m-b-20">
                            <div id="chat-scroll">
                              <ul class="chat-list list-unstyled m-b-0">
                                @if (!empty($chat))
                                <a href="{{route('new_chat',$chat->receiver_id)}}"></a>
                                <li class="clearfix active">
                                  <img src="{{asset('assets/img/users/user-4.png')}}" alt="avatar">
                                  <div class="about">
                                    <div class="name">William Smith</div>
                                    <div class="status">
                                      <i class="material-icons offline">fiber_manual_record</i>
                                      left 7 mins ago </div>
                                  </div>
                                </li>
                                @endif
                              
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="chat">
                        <div class="chat-header clearfix">
                          <img src="{{asset("images/project/".$project->image)}}" style="width:80px;" alt="avatar">
                          <div class="chat-about">
                            <div class="chat-with">{{$project->name}}</div>
                            <div class="chat-num-messages"></div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-box" id="mychatbox">
                        <div class="col-md-12 card-body chat-content" style="background-color: bisque; max-height: 300px; overflow-y: auto;">
                          @if (!empty($messages))
                          @foreach ($messages as $message)
                          
                         <div class="row mt-2">
                          @if (auth('manager')->check() && ($message->manager_id == auth('manager')->user()->id || auth('admin')->check()))
                          {{-- @if ($message->manager_id == auth('manager')->user()->id || auth('admin')->check()) --}}
                          <div class="offset-md-6 col-md-6 message right" style="border: 1px solid white; background-color:white;">
                            <span style="padding: 2px; margin:20px; background-color:white; color:black">{{ $message->content }}</span>
                            <span style="font-size: 10px; margin-left:250px;">{{ date_format($message->created_at,'h:m:s A') }}</span>
                          </div>
                          @else
                          <div class=" col-md-6 m-2 message left" style="border: 1px solid white; background-color:white;">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="{{asset("images/manager/".$message->manager->image)}}" style="width: 40px;">
                               </div>
                               <div class="col-md-11">
                                 <p><strong style="margin-left:10px;">{{ $message->manager->name." " }}</strong>{{$message->manager->email}}</p>
                                 <span style="font-size: 20px; margin-left:80px;">{{ $message->content }}</span>
                                 <span style="font-size: 10px; margin-left:250px;">{{ date_format($message->created_at,'h:m:s A') }}</span>
                               </div>
                          </div>
                        </div>
                          @endif
                         </div>

                          @endforeach
                          @endif

                        </div>
                        <div class="card-footer chat-form">
                          @if (!auth('admin')->check())
                              
                          <form action="{{ route('message', $project->id) }}" method="post" enctype="multipart/form-data" id="chat-form">
                            @csrf
                        
                            <div class="form-group" style="display: flex;">
                        
                                <div class="mr-3">
                                    <label for="image_path"><i class="fas fa-image"></i> Image</label>
                                    <input type="file" name="image_path" class="form-control">
                                </div>
                                <input type="hidden" value="{{$project->id}}" name="project_id">
                        
                                <div class="mr-3">
                                    <label for="video_path"><i class="fas fa-video"></i> Video</label>
                                    <input type="file" name="video_path" class="form-control">
                                </div>
                        
                                <div class="mr-3">
                                    <label for="voice_note"><i class="fas fa-microphone"></i> Voice Note</label>
                                    <input type="file" name="voice_note" accept="audio/*" class="form-control">
                                </div>
                        
                                <div class="mr-3">
                                    <label for="content"><i class="fas fa-pencil-alt"></i> Type a message</label>
                                    <input type="text" name="content" class="form-control" placeholder="Type a message">
                                </div>
                        
                            </div>
                        
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary" style="background-color: #3490dc; color: #ffffff; font-weight: bold;">
                                    <i class="far fa-paper-plane"></i> Send
                                </button>
                            </div>
                        </form>
                        @endif

                        
                        
                        </div>
                      </div>
                </div>
            </div>
        </div>

      </div>
    </section>
  </div>
@endsection


@push('customJs')
    
@endpush