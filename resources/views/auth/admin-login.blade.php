@extends('blogs.backend')

@section('rechterkolom')

    @include('layouts.errors')

    <div class="col-sm-8">
        <h2>Backend Login</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord: </label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </form>
    </div>
@endsection