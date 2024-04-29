@extends('theme.master')
@section('title','register')
@section('content')
@include('theme.partials.hero',['title'=>'register'])
  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="#/" class="form-contact contact_form" action="{{ route('register.post') }}" method="post"  novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" type="text" value="{{ old('name') }}" placeholder="Enter your name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="form-group">
                  <input class="form-control border" name="email" value="{{ old('email') }}" type="email" placeholder="Enter email address">
                  <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password"  type="password" placeholder="Enter your password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                  </div>
                  <div class="form-group">
                      <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <a href="{{ route('login') }}" class="mx-3 btn btn-warning ">Already Registered ? </a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

@endsection
