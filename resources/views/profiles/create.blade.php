@extends('layouts.app')

@section('content')
    <div class="container ">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1> Create your profile</h1>
                    </div>
                    <div class="form-group row">
                        <label for="jobTitle" class="col-md-4 col-form-label">JobTitle</label>


                        <input id="jobTitle"
                               type="text"
                               class="form-control @error('jobTitle') is-invalid @enderror"
                               name="jobTitle"
                               autocomplete="jobTitle" autofocus>

                        @error('jobTitle')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="desctiption" class="col-md-4 col-form-label">Description</label>


                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               name="description"
                               autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-md-4 input-group date">Birthday</label>


                        <input id="birthday"
                               type="date"
                               class="form-control @error('birthday') is-invalid @enderror"
                               name="birthday"
                               autocomplete="birthday" autofocus>

                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class=" form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                        <input type="file" , class="form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>

                        @enderror
                    </div>
                    <div class=" forum-group row pt-4">
                        <button  class="btn btn-primary"> Save Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
