@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <a class="btn btn-danger" href="{{url('/addcatagorie')}}">Add Catagories</a>
        <a class="btn btn-info" href="{{url('/allcatagorie')}}">All Catagories</a>


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


        <form action="{{URL::to('/updatecatagorie/'.$show->id)}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>catagorie name</label>
              <input type="text" class="form-control" value="{{$show->name}}" name="name" ></p>
            </div>
          </div>

       
<br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>slug name</label>
              <input type="text" class="form-control" value="{{$show->slug}}" name="slug" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
         
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection