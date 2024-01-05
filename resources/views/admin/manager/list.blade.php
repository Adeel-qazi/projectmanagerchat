@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
     
      <div class="section-body">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>Managers Table</h1>
                </div>
                <div class="card-body">
                         <a href="{{route('managers.create')}}"><button class="btn btn-primary">Create</button></a>       
                 </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    @if (!empty($managers))
                    @foreach ($managers as $manager)
                    <tr>
                        <td>{{$manager->name}}</td>
                        <td>{{$manager->email}}</td>
                        <td style="display: flex;">
                          <a href="{{ route('managers.edit', $manager->id) }}" style="text-decoration: none;">
                              <button style="background-color: #FFD700; border: none; padding: 5px; margin-right: 5px;" title="Edit Manager">
                                  <i style="color: white;" class="fas fa-edit"></i> 
                              </button>
                          </a>
                      
                            <form id="deleteForm{{ $manager->id }}" action="{{ route('managers.destroy', $manager->id) }}" method="post">
                            @csrf
                            @method('DELETE')  
                            <button type="button" onclick="confirmDelete({{ $manager->id }})" style="background-color: #DC143C; border: none; padding: 5px;" title="Delete Manager">
                                <i style="color: white;" class="fas fa-trash-alt"></i> 
                            </button>
                        </form>
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
  function confirmDelete(managerId) {
      Swal.fire({
          title: 'Are you sure?',
          text: 'You want to delete this manager',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DC143C',
          cancelButtonColor: '#6c757d',
          confirmButtonText: 'Yes, delete it!',
          width: '30%',
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('deleteForm' + managerId).submit();
          }
      });
  }
</script>
@endpush
