
@extends('blogs.frontend')

@section('rechterkolom')

    @include('layouts.errors')

    <div class="col-sm-8">
        <h2>Aanmelden voor een account</h2>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Naam:</label>
                
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif                
            </div>

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
                <label for="password-confirm">Wachtwoord herhalen: </label>                
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>                
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Aanmelden</button>
            </div>
        </form>
    </div>
@endsection


