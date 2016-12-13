@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Get Your File</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/upfile')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    
                        @if($yourfile != null)
                        <a href="{{$yourfile->downloadlink}}">{{$yourfile->displaylink}}</a>
                        @else
                        <h3>No File Found!</h3>
                        @endif
                       {{-- <h5>{{Request::root()}}</h5>
                       <h5>{{URL::to('/')}}</h5> --}}
                       <h5></h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

