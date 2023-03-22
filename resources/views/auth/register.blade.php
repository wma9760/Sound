@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row mb-3">
                                        <label for="gender" class="col-md-4 col-form-label "> Gender<sup>*</sup></label>
                                        <div class="col-md-8">
                                        <span  class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" id="male" checked="checked"
                                                name="gender" type="radio" value="male">
                                            <label for="male" class="custom-control-label">Male</label>
                                        </span >
                                        <span  class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" id="female" name="gender" type="radio"
                                                value="female">
                                            <label for="female" class="custom-control-label">Female</label>
                                        </span >
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                    {{--  --}}
                                    <div class="form-group row mb-3">
                                        <label for="mobileNo" class="col-md-4 col-form-label ">{{ __('Mobile No') }}</label>
                                        <div class="col-md-8">
                                        <input id="mobileNo" type="text" class="form-control @error('mobileNo') is-invalid @enderror" name="mobileNo" required >
                                        @error('mobileNo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                        </div>
                                        {{--  --}}
                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label ">{{ __('address') }}</label>

                    <div class="col-md-8">
                        {{-- <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus> --}}
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus rows="3" name="address" cols="50" id="address"></textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    {{--  --}}
                    {{--  --}}
                    <div class="row mb-3">
                        <label for="country_id" class="col-md-4 col-form-label ">{{ __('Country') }}</label>

                        <div class="col-md-8">
                            <select class="form-select form-control  class="form-control @error('country_id') is-invalid @enderror" name="country_id" required  name="country_id">
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                @endforeach
                        </select>
                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{--  --}}
                    <div class="row mb-3">
                        <label for="userimage" class="col-md-4 col-form-label ">{{ __('Upload Profile Image') }}</label>

                        <div class="col-md-8">
                            <input id="userimage" type="file" class="form-control @error('userimage') is-invalid @enderror" name="userimage" required />

                            @error('userimage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col"></div>
                                <div class="col  align-self-center d-flex justify-content-center align-content-center ">
                                    <button type="submit" class="btn btn-primary ">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
