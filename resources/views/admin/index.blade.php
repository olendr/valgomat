@extends('app')

@section('content')



    <div class="container">

        <div class="page-header">
            <h1>Hello {{ Auth::user()->name }}</h1>
            <p class="lead">Welcome to the Valgomat admin</p>
        </div>

        @include('admin.messages')

        <div class="row">
            <div class="col-sm-4">
                @include('admin.forms.opinion')
            </div>
            <div class="col-sm-4">
                @include('admin.forms.category')
            </div>
            <div class="col-sm-4">
                @include('admin.forms.party')
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                @include('admin.lists.categories')
            </div>
            <div class="col-sm-6">
                @include('admin.lists.parties')
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@endsection