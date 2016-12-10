@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UpFile</div>
                <div class="form-horizontal">
                    @if(Session::has('success'))
                    <div class="alert-box success">
                      <h2>{!! Session::get('success') !!}</h2>
                      @if(isset($downloadlink))
                    <a href="{{$downloadlink}}"><h3>Click to download</h3></a>
                  @endif
                  </div>
                  @endif                  

                  <div class="form-group"></div>
                  {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                 
                          {!! Form::file('image') !!}
                          <p class="errors">{!!$errors->first('image')!!}</p>
                          @if(Session::has('error'))
                          <p class="errors">{!! Session::get('error') !!}</p>
                          @endif
                  
                  <div id="success"> </div>
                  {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                  {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
