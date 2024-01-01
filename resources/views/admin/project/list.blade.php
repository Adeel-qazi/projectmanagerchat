@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
      <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title m-b-0">Advance Table</h4>
        </li>
      </ul>
      <div class="section-body">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>Projects</h1>
                </div>
                <div class="card-body">
                  @if (!auth('admin')->user())
                  <a href="{{route('projects.create')}}"><button class="btn btn-primary">Create</button></a>       
                  @endif
                 </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Start</th>
                      <th>Close</th>
                      <th>Project Created</th>
                      <th>Action</th>
                    </tr>
                    
                    @if (!empty($projects))
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type }}</td>
                                <td>{{ $project->start }}</td>
                                <td>{{ $project->close }}</td>
                                <td>{{ $project->manager->name }}</td>
                                <td style="display: flex;">
                                    <a href="{{ route('projects.edit', $project->id) }}">
                                        <button class="btn btn-primary" {{ auth('manager')->user()->id === $project->manager_id ? '' : 'disabled' }} style="{{ auth('manager')->user()->id === $project->manager_id ? '' : 'cursor: not-allowed' }}">Edit</button>
                                    </a>
                                
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this project')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" {{ auth('manager')->user()->id === $project->manager_id ? '' : 'disabled' }} style="{{ auth('manager')->user()->id === $project->manager_id ? '' : 'cursor: not-allowed' }}">Delete</button>
                                    </form>
                                    @if (!auth('admin')->user())
                                        
                                    <a href="{{ route('chatbox.index', $project->id) }}">
                                      <button class="btn btn-success" >Chatbox</button>
                                  </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                
                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                          class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
 
    
@endsection
