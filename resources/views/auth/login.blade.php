@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                              <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                               <a href="{{url('auth/google')}}" class="btn btn-primary">Login with Google</a>
                            </div>
                        </div>

                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
