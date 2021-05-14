@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students Lists</div>

                <div class="card-body">
                  <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>University Name</th>
                            <th colspan ="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->university->name}}</td>
                        <td>
                        <a class="btn btn-small btn-info" href="{{ url('students/' . $student->id . '/edit') }}">Edit</a>
                      </td>
                        <td>
                          <form action="{{ url('students/' . $student->id) }}" method="POST">
                              {{ method_field('DELETE') }}
                              @csrf
                              <button type = "submit">Delete </button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                </div>
                  </tbody>
                </thead>
              </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
