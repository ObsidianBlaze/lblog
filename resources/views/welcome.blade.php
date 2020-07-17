@extends('layout.main')

@section('content')
<h1>Home Page</h1>
@if(session('successMsg'))

<div class="alert alert-success" role="alert">
    {{ session('successMsg') }}
</div>

@endif
<div class="container">

<table class="table">
    <thead class="black white-text">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($students as $student)

      <tr>
        <th scope="row">{{ $student->id }}</th>
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>
            <a href="{{route('edit',$student->id) }}">EDIT</a>
            ||
            <form style="display: none" method="post" id="delete-form-{{  $student->id  }}" action="{{route('delete',$student->id)  }}">
                {{csrf_field()  }}
                {{method_field('delete')  }}
            </form>
            <button onclick="if(confirm('Do you want to delete?')){
                event.preventDefault();
                document.getElementById('delete-form-{{  $student->id  }}').submit();
            }
            else{
                event.preventDefault();
            }
            ">
                Delete
            </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    {{$students->links()  }}
</div>
@endsection

