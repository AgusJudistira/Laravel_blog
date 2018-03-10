@extends('blogs.frontend')

@section('rechterkolom')

    @include('layouts.errors')

    <div class="col-sm-8">
        <h2>Account aanmaken</h2>
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Naam: </label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord: </label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Wachtwoord bevestigen: </label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Account aanmaken</button>
            </div>
        </form>
    </div>
@endsection