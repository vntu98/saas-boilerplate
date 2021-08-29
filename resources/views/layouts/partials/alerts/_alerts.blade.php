@if (session()->has('success'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'success'])
        <strong>{{ session('success') }}</strong>
    @endcomponent
@endif

@if (session()->has('error'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'danger'])
        <strong>{{ session('error') }}</strong>
    @endcomponent
@endif