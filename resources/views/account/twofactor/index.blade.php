@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.twofactor.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="dial_code" class="control-label">Dialling code</label>
                    <select name="dial_code" id="dial_code" class="custom-select form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->dial_code }}">{{ $country->name }} (+{{ $country->dial_code }})</option>
                        @endforeach
                    </select>

                    @error('dial_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number" class="control-label">Phone number</label>
                    <input type="password" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enable</button>
            </form>
        </div>
    </div>
@endsection
