@extends('admin.layouts.master')


@section('content')
<div class="main-content">
    <section class="section">
        @if (!empty($user))
            
              <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                  <h4 class="page-title m-b-0">Profile</h4>
                </li>
              </ul>
              <div class="section-body">
                <div class="row mt-sm-4">
                
                  <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                      <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                              aria-selected="true">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                              aria-selected="false">Setting</a>
                          </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                          <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                              <div class="col-md-3 col-6 b-r">
                                <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{$user->name}}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">{{$user->phone}}</p>
                              </div>
                              <div class="col-md-3 col-6 b-r">
                                <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$user->email}}</p>
                              </div>
                            </div>
                            <p class="m-t-30">Completed my graduation in Arts from the well known and
                              renowned institution
                              of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                              affiliated
                              to M.S. University. I ranker in University exams from the same
                              university
                              from 1996-01.</p>
                            <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                              Gujarat
                              from 2003-2015 </p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                              industry. Lorem
                              Ipsum has been the industry's standard dummy text ever since the 1500s,
                              when
                              an unknown printer took a galley of type and scrambled it to make a
                              type
                              specimen book. It has survived not only five centuries, but also the
                              leap
                              into electronic typesetting, remaining essentially unchanged.</p>
                          </div>
                          <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <form method="post" action="{{route('update.profile',$user->id)}}" class="needs-validation">
                                @csrf
                              <div class="card-header">
                                <h4>Edit Profile</h4>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    <div class="invalid-feedback">
                                      Please fill in the first name
                                    </div>
                                  </div>
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <div class="row">
                                  <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    <div class="invalid-feedback">
                                      Please fill in the email
                                    </div>
                                </div>
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                              </div>
                              <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endif
       
        </section>
</div>
    
@endsection
