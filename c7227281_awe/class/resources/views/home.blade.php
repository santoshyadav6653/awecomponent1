@extends('layouts.app')

@section('content')
<div class="bg">
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-dark">{{ __('Dashboard') }}</div>

                <div class="card-body-dark">
                    @if (session('status'))
                        <div class="alert alert-dark" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                    @if(auth()->user()->is_admin)
                    {{ __('Welcome Admin!') }}
                    
                    @else
                    {{ __('You are logged in as User!') }} {{Auth::user()->name}}
                    @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
