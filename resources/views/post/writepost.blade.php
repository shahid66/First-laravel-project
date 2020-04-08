@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12  mx-auto">

        <a class="btn btn-danger" href="{{url('/addcatagorie')}}">Add Catagories</a>
        <a class="btn btn-info" href="{{url('/allcatagorie')}}">All Catagories</a>
        <a class="btn btn-success" href="{{url('allpost')}}">All Post</a>

        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


        <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>post title</label>
              <input type="text" class="form-control" placeholder="Title" name="title" ></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagories</label>
              <select class="form-control" name="catagorie_id">
              	@foreach($show as $row)
              	<option value="{{$row->id}}">{{$row->name}}</option>
              	@endforeach
              </select>
            </div>
          </div>
<br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post image</label>
              <input type="file" class="form-control" name="image" >
              
            </div>
          </div>
         
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection


