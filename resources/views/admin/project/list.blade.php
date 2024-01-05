@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>Projects Table</h1>
                </div>
                <div class="card-body">
                  <a href="{{route('projects.create')}}"><button class="btn btn-primary">Create</button></a>       
                 </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
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
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type }}</td>
                                <td>{{ $project->start }}</td>
                                <td>{{ $project->close }}</td>
                                <td>{{ $project->manager->name }}</td>
                                <td style="display: flex;">
                                  <a href="{{ route('projects.edit', $project->id) }}">
                                      <button style="background-color: #FFD700; border: none; padding: 5px; margin-right: 5px;">
                                          <i style="color: white;" class="fas fa-edit"></i>
                                      </button>
                                  </a>
                              
                                  <form id="deleteForm{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" onclick="confirmDelete({{ $project->id }})" style="background-color: #DC143C; border: none; padding: 5px; margin-right: 5px;" title="Delete Project">
                                          <i style="color: white;" class="fas fa-trash-alt"></i>
                                      </button>
                                  </form>
                              
                                  <a href="{{ route('chatbox.index', $project->id) }}">
                                      <button style="background-color: green; border: none; padding: 5px;">
                                          Chatbox
                                      </button>
                                  </a>
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


@push('customJs')
<script>
  function confirmDelete(projectId) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You want to delete this project',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#DC143C',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it!',
      width: '30%',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('deleteForm' + projectId).submit();
      }
    });
  }
</script>


    
@endpush
