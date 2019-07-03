@extends('layout')
 
@section('content')
    <div class="container">
 
        <div class="panel panel-primary">
 
         <div class="panel-heading">Charts In Laravel 5 Using Charts Package</div>
 
          <div class="panel-body">    
            <div class="row">
            <div class="col-md-6"> 
               {!! $chart->render()() !!}
            </div>
 
            <br/><br/>
 
 
         </div>
 
        </div>
 
    </div>
</div>
 
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection
 