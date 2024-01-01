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
                    <h1>Managers</h1>
                </div>
                <div class="card-body">
                         <a href="{{route('managers.create')}}"><button class="btn btn-primary">Create</button></a>       
                 </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    @if (!empty($managers))
                    @foreach ($managers as $manager)
                    <tr>
                        <td>{{$manager->id}}</td>
                        <td>{{$manager->name}}</td>
                        <td>{{$manager->email}}</td>
                        <td style="display: flex;">
                            <a href="{{route('managers.edit',$manager->id)}}"><button class="btn btn-secondary">Edit</button></a>
                            <form action="{{route('managers.destroy',$manager->id)}}" method="post" onsubmit="return confirm('Are you sure You want to delete this manager')">
                              @csrf
                              @method('DELETE')  
                              <button class="btn btn-danger">Delete</button>
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
