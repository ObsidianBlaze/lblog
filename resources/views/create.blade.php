@extends('layout.main')

@section('content')
<div class="container">
    
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
@endif


<h1>CREATE PAGE</h1>
<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('store') }}" method="POST">

    {{ csrf_field() }}

    <p class="h4 mb-4">ADD STUDENT</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="firstname" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" name="lastname" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword" name="phone_number" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
 

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">ADD</button>

</form>
<!-- Default form register -->
</div>

@endsection