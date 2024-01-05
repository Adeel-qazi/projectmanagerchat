@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4>Edit Project </h4>
                </div>
                <div class="card-body">
                        <form action="{{route('projects.update',$project->id)}}" enctype="multipart/form-data" method="post" name="" id="">
                            @csrf
                            @method('put')
                          <div class="row">
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="name">Name</label>
                                 <input type="text" name="name" id="name" value="{{$project->name}}" class="@error('name') is-invalid @enderror form-control" placeholder="Enter The Name">
                             @error('name')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="image">Image</label>
                                  <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Enter The Image">
                                  
                                  @if (!empty($project->image))
                                      <div class="mt-2">
                                          <img src="{{ asset('images/project/'.$project->image) }}" alt="current-image" style="max-width: 100%;">
                                          <input type="hidden" name="existingImage" id="existingImage" value="{{ $project->image }}">
                                      </div>
                                  @endif
                          
                                  @error('image')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="type">Type</label>
                                  <select name="type" class="form-control">
                                    <option {{($project->type == 'development') ? 'selected': ''}} value="development">Development</option>
                                    <option {{($project->type == 'design') ? 'selected': ''}} value="design">Design</option>
                                    <option {{($project->type == 'marketing') ? 'selected': ''}} value="marketing">Marketing</option>
                                    <option {{($project->type == 'research') ? 'selected': ''}} value="research">Research</option>
                                </select>
                                 @error('type')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start">Start Date</label>
                                   <input type="date" name="start" id="start" value="{{$project->start}}" class="@error('start') is-invalid @enderror form-control">
                                   @error('start')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>

                               <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="close">Close Date</label>
                                   <input type="date" name="close" id="close" value="{{$project->close}}" class="@error('close') is-invalid @enderror form-control">
                                   @error('close')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>

                               @if (auth('admin')->check())
                               <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="type">Managers</label>
                                  <select name="manager_id" class="form-control">
                                    @if (!empty($managers))
                                      @foreach ($managers as $manager)
                                      <option {{($project->manager_id == $manager->id)? 'selected': ''}} value="{{$manager->id}}">{{$manager->name}}</option>
                                      @endforeach
                                      @endif
                                  </select>
                                   @error('manager_id')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>
                               @endif
              
                          </div>
              
                          <div class="col-md-6">
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                             </div>
                      </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 
    
@endsection
