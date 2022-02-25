@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
   </div>
  @endif
  @if(session()->get('message'))
  <div class="alert alert-success" role="alert">
    <strong>{{session()->get('message')}}</strong>
  </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Profile</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                    <form action="{{route('edit')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                        </div><br>

                        <div class="form-group">
                            <label for="email"><strong>Email:</strong></label>
                            <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email">
                        </div><br>
                        
                        <div class="form-group">
                            <label for="address"><strong>Address:</strong></label>
                            <input type="text" class="form-control" id ="address" name="address" value="{{Auth::user()->address}}">
                        </div><br>

                        <div class="form-group">
                            <label for="password"><strong>Password:</strong></label>
                            <input type="password" class="form-control" id ="password" name="password">
                        </div><br>

                        
                        <button class="btn btn-primary" type="submit">Update</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection