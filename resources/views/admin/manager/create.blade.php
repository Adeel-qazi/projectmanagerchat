@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
      <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title m-b-0">Form</h4>
        </li>
        <li class="breadcrumb-item">
          <a href="index-2.html">
            <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item">Basic Form</li>
      </ul>
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4>create </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('managers.store')}}" method="post" name="" id="" enctype="multipart/form-data">
                        @csrf
                          <div class="row">
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="name">Name</label>
                                 <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Enter The Name">
                             @error('name')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="email">Email</label>
                                 <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror form-control">
                                 @error('email')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                   <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror form-control">
                                   @error('password')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>

                               <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password">Password Confirmation</label>
                                   <input type="password" name="password_confirmation" id="password"  class="@error('password_confirmation') is-invalid @enderror form-control">
                                   @error('password_confirmation')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>
                               <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                   <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control" placeholder="Enter The Image">
                                   @error('image')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>
              
                          </div>
              
                          <div class="col-md-6">
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create</button>
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
