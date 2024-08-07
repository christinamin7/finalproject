@extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card mt-3">
               <div class="card-body">
                <h5>Student Form</h5>
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>               
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>                            
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label  @error('phone') is-invalid @enderror">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label  @error('date_of_birth') is-invalid @enderror">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label  @error('gender') is-invalid @enderror">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                            <label class="form-check-label" for="male">
                             Male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="0" checked>
                            <label class="form-check-label" for="female">
                             female
                            </label>
                          </div>
                    </div>
                    <div class="mb-3">
                        <h6><b>Skills</b></h6>
                        <div class="form-check">
                            <input class="form-check-input" name="skills[]" type="checkbox" value="java" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Java
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  name="skills[]" type="checkbox" value="angular" id="flexCheckChecked1" >
                            <label class="form-check-label" for="flexCheckChecked1">
                             Angular
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  name="skills[]" type="checkbox" value="jquery" id="flexCheckChecked2" >
                            <label class="form-check-label" for="flexCheckChecked2">
                             J Query
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  name="skills[]" type="checkbox" value="aws" id="flexCheckChecked3" >
                            <label class="form-check-label" for="flexCheckChecked3">
                             Aws
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  name="skills[]" type="checkbox" value="html" id="flexCheckChecked4" >
                            <label class="form-check-label" for="flexCheckChecked4">
                             HTML
                            </label>
                        </div>
                    </div>   
                    <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input"  name="" type="checkbox" value="html" id="is_fullstack" >
                            <label class="form-check-label" for="is_fullstack">
                             Fullstack
                            </label>
                          </div>
                    </div>                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label  @error('address') is-invalid @enderror" >Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label  @error('profile') is-invalid @enderror"　>Profile</label>
                        <input type="file" class="form-control" name="profile" id="profile" placeholder="Profile" value="{{ old('profile') }}">
                        @error('profile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
               
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
 
            </div>
        </div>
    </div>
</div>

@endsection