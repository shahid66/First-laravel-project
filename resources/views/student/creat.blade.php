@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        
        <a class="btn btn-info" href="{{route('all.student')}}">All Students</a>


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


        <form action="{{route('store.student')}}" method="post">
          @csrf
          <br><br>
          <h3>New Student Insert</h3>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student name</label>
              <input type="text" class="form-control" placeholder="Student Name" name="s_name" ></p>
            </div>
          </div>

       
<br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" placeholder="Student Email" name="s_email" >
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone Number</label>
              <input type="number" class="form-control" placeholder="Student Phone Number" name="s_phone" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
         
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection