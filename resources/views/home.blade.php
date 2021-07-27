@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <h3> Hi {{auth()->user()->name}} </h3>
                <p>
            <a class="btn btn-primary btn-lg" href="/payment" role="button">
                 $ pay now
            </a>
        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
