@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- adding address as an field --}}
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <style>
                                    /* #address {
                                    z-index: 1;
                                    margin: 20px;
                                    } */
                                    .mapboxgl-ctrl-geocoder {
                                    min-width: 100%;
                                    }
                                </style>

                                
                                <div id="geocoder" class="form-control @error('address') is-invalid @enderror"></div>
                                <input type="hidden" id="address" name="address" value="">
                                
                                <script>
                                    mapboxgl.accessToken = 'pk.eyJ1IjoidGh1bmRlcmJpcmQ5IiwiYSI6ImNsMDFzNTdzczB1NG0zcXBtYXV6dDZ3am0ifQ.t20lkMGNK42DTdtI0ZgssA';
                                    const geocoder = new MapboxGeocoder({
                                        accessToken: mapboxgl.accessToken
                                    });

                                    geocoder.addTo('#geocoder');

                                    const results = document.getElementById('address');
 
                                    geocoder.on('result', (e) => {
                                    
                                        var val = JSON.stringify(e.result.place_name, null, 2);

                                        val = val.replace(/\"/g, ""); //to replace "" from result string
                                        // console.log(val);
                                        results.value = val;
                                    });
                                    
                                    geocoder.on('clear', () => {
                                    results.value = '';
                                });
                                </script>
                                
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
