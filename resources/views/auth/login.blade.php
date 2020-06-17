@extends('layouts.auth')

@section('content')

<login-form csrftoken="{{csrf_token()}}" href-login="{{ route('login') }}" href-pass-request="{{ route('password.request') }}" :old="{{ json_encode(Session::getOldInput()) }}" :errors="{{json_encode($errors->all())}}"></login-form>

@endsection