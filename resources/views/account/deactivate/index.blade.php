@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.deactivate.store') }}" method="post">
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

                <button type="submit" class="btn btn-primary">Deactivate account</button>
            </form>
        </div>
    </div>
@endsection
