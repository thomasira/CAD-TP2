@extends('layouts.layout')
@section('title', 'Creer')
@section('content')
@include('layouts.nav')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post" action="{{ route('authent') }}">
                @csrf
                    <div class="card-header text-center">
                        <h2>Log in</h2>
                    </div>
                    <div class="card-body">
                        <div class="control-group d-grid gap-3">
                            <label class="col-12">Email
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <label class="col-12">Password
                                <input type="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection