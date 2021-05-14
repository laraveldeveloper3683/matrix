@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">University Lists</div>

                <div class="card-body">
                  <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th colspan ="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($universities as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td><img src ="{{asset('/storage/'.$student->logo_path)}}" height="100" , width="100"></img></td>
                        <td>{{$student->website}}</td>
                        <td>
                        <a class="btn btn-small btn-info" href="{{ url('university/' . $student->id . '/edit') }}">Edit</a>
                      </td>
                        <td>
                          <form action="{{ url('university/' . $student->id) }}" method="POST">
                              {{ method_field('DELETE') }}
                              @csrf
                              <button type = "submit">Delete </button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                    {{ $universities->links() }}
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
