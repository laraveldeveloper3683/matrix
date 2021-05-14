@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Student</div>

                <div class="card-body">
                  <form method="POST" action="{{route('students.update' , $student->id)}}">
                    {{ method_field('PUT') }}
                      @csrf

                      <div class="form-group row">
                          <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                          <div class="col-md-6">
                              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $student->first_name }}" required>

                              @error('first_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                          <div class="col-md-6">
                              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $student->last_name }}" required >

                              @error('last_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

                          <div class="col-md-6">
                            <select class="form-control @error('university_id') is-invalid @enderror" name="university_id">
                              @foreach($university as $name){
                                @if($student->university_id == $name->id)
                                <option value="{{$name->id}}" selected>{{$name->name}} </option>
                                @else
                                <option value="{{$name->id}}">{{$name->name}} </option>
                                @endif
                              }
                              @endforeach
                            </select>
                              <!-- <input id="university_id" type="number" class="form-control @error('university_id') is-invalid @enderror" name="university_id" value="{{ $student->university_id }}" required > -->

                              @error('university_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                          <div class="col-md-6">
                              <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $student->phone }}" required >

                              @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Update') }}
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
