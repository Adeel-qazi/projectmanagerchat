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
                    <h1>Chat Managers</h1>
                </div>
                {{-- <div class="card-body">
                         <a href="{{route('managers.create')}}"><button class="btn btn-primary">Create</button></a>       
                 </div> --}}
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                    @if (!empty($managers))
                    @foreach ($managers as $manager)
                    <tr>
                        <td>{{$manager->name}}</td>
                        @if (auth('manager')->check())
                        <td style="display: flex;">
                          <a href="{{route('new_chat',$manager->id)}}"><button class="btn btn-primary">New Chat</button></a>
                        </td>
                          @endif
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
