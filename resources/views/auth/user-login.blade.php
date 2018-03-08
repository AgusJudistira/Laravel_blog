@extends('blogs.frontend')

@section('rechterkolom')

    @include('layouts.errors')

    <div class="col-sm-8">
        <h2>Visitors Login</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord: </label>
                <input type="password" class="form-control" id="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </form>
    </div>
@endsection

