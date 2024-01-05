@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4>Edit Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('managers.update',$manager->id)}}" method="post" enctype="multipart/form-data" name="" id="">
                        @csrf
                        @method('put')
                          <div class="row">
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="name">Name</label>
                                 <input type="text" name="name" id="name" value="{{$manager->name}}" class="@error('name') is-invalid @enderror form-control" placeholder="Enter The Name">
                             @error('name')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                              <div class="mb-3">
                                  <label for="email">Email</label>
                                 <input type="email" name="email" id="email" value="{{$manager->email}}" class="@error('email') is-invalid @enderror form-control">
                                 @error('email')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                              </div>
                             </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                   <input type="password" name="password" id="password"  class="@error('password') is-invalid @enderror form-control">
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
                                   @if (!empty($manager->image))
                                   <div class="mb-3">
                                   <img src="{{asset('images/manager/'.$manager->image)}}"  alt="current-image" style="max-width: 100%;">
                                   <input type="hidden" name="existingImage" id="existingImage" value="{{$manager->image}}" >
                                   </div>
                                   @endif
                                   @error('image')
                                   <div class="alert alert-danger">{{$message}}</div>
                               @enderror
                                </div>
                               </div>

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
