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
                    <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data" name="" id="">
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
                                  <label for="image">Image</label>
                                 <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control" placeholder="Enter The Image">
                                 @error('image')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="type">Type</label>
                                  <select name="type" class="form-control">
                                    <option value="development">Development</option>
                                    <option value="design">Design</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="research">Research</option>
                                </select>
                                 @error('type')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start">Start Date</label>
                                   <input type="date" name="start" id="start" class="@error('start') is-invalid @enderror form-control">
                                   @error('start')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>

                               <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="close">Close Date</label>
                                   <input type="date" name="close" id="close" class="@error('close') is-invalid @enderror form-control">
                                   @error('close')
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