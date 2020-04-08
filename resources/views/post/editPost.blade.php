@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12  mx-auto">

        
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


        <form action="{{URL::to('updatepost/'.$post->id)}}" method="POST" enctype="multipart/form-data">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>post title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title" ></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagories</label>
              <select class="form-control" name="catagorie_id">
              	@foreach($cata as $row)
              	<option value="{{$row->id}}"

                  <?php if($row->id == $post->catagorie_id) echo "selected";?>

                  >{{$row->name}}</option>
              	@endforeach
              </select>
            </div>
          </div>
<br>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post image</label>
              <input type="file" class="form-control" name="image" >
              Old Image:<img src="{{URL::to($post->image)}}" style="height: 100px;width: 300px;">
              <input type="hidden" name="old_photo" value="{{$post->image}}">
            </div>
          </div>
         
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control"  name="details" id="message" required data-validation-required-message="Please enter a message.">{{$post->details}}</textarea>
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