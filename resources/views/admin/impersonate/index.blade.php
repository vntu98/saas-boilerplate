@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="{{ route('admin.impersonate.start') }}" method="post">
                        @csrf
        
                        <div class="form-group">
                            <label for="email" class="control-label">User email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <button type="submit" class="btn btn-primary">Impersonate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
