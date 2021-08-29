@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.password.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="password_current" class="control-label">Current password</label>
                    <input type="password" name="password_current" id="password_current" class="form-control @error('password_current') is-invalid @enderror">

                    @error('password_current')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">New password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="control-label">Password confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Change password</button>
            </form>
        </div>
    </div>
@endsection
