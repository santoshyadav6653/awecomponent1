
@extends('layouts.app')

@section('content')
<br>
<br>
<h1 class="my-4 heading text-center"style="color:black;">update product</h1>

<div class="padding container-fluid d-flex justify-content-center">
    <div class="col-md-6">
        <div class="free-quote bg-dark h-100">
            <h2 class="my-4 heading text-center">Insert data here!!!</h2>
            <form action="/edit" method="POST">
                @csrf

                <span><strong>Product Type:</strong></span>
                <select class="form-control btn-block" name="choice" value="{{$data['choice']}}">
                    <option value="cd">CDs</option>
                    <option value="book">BOOk</option>
                </select><br>

                <input  type="hidden" name="id" value="{{$data['id']}}">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="firstname" placeholder="First Name"  value="{{$data['firstname']}}">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="surname" placeholder="Surname"  value="{{$data['surname']}}">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="price" placeholder="Price"  value="{{$data['price']}}">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="papl" placeholder="Pages/Play Length" value="{{$data['papl']}}">
                <br>
                <br>
                <button type="submit" name="" class="btn btn-dark">update</button>




            </form>

        </div>
    </div>
</div>
@endsection
