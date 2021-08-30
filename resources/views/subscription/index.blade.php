@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscription</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('subscription.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="plan" class="col-md-4 col-form-label text-md-right">Plan</label>
 
                            <div class="col-md-6">
                                <select name="plan" id="plan" class="form-control custom-select">
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->gateway_id }}" {{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id ? 'selected="selected"' : ''}}>{{ $plan->name }} ({{ $plan->price }})</option>
                                    @endforeach
                                </select>

                                @error('plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="coupon" class="col-md-4 col-form-label text-md-right">Coupon</label>

                            <div class="col-md-6">
                                <input id="coupon" type="text" class="form-control @error('coupon') is-invalid @enderror" name="coupon" value="{{ old('coupon') }}">

                                @error('coupon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Pay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
