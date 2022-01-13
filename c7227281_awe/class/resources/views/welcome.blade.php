@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1>Books</h1>

    </div>
    <div class="row mt-3">
        <div class="col-md-12">


            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">firstname</th>
                        <th scope="col">surname</th>
                        <th scope="col">Price</th>
                        <th scope="col">Pages</th>
                        <th scope="col">Type</th>
                        <th scope="col">entered by</th>
                        @if(Auth::check())
                        @if(auth()->user()->is_admin)
                        <th scope="col">action</th>
                        @endif
                        @endif



                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $data)
                        @if($data->choice == 'book')
                            <tr>
                                <th scope="row">{{$data ->id}}</th>
                                <td>{{ $data->firstname }}</td>
                                <td>{{ $data->surname }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->papl }}</td>
                                <td>{{ $data->choice }}</td>
                                <td>{{$data->entered_by}}</td>
                                <td>
                                    @if(Auth::check())
                                    @if(auth()->user()->is_admin)
                                    <a href={{"edit/".$data['id']}} class="btn btn-success">update</a>
                                    <br>
                                    <br>
                                    <a href={{"delete/".$data['id']}} class="btn btn-dark">Delete</a>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <h1>Cds</h1>

    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">firstname</th>
                        <th scope="col">surname</th>
                        <th scope="col">Price</th>
                        <th scope="col">Length</th>
                        <th scope="col">Type</th>
                        <th scope="col">entered by</th>
                        @if(Auth::check())
                        @if(auth()->user()->is_admin)
                        <th scope="col">action</th>
                        @endif
                        @endif


                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $data)
                        @if($data->choice == 'cd')
                            <tr>
                                <th scope="row">{{$data ->id}}</th>
                                <td>{{ $data->firstname }}</td>
                                <td>{{ $data->surname }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->papl }}</td>
                                <td>{{ $data->choice }}</td>
                                <td>{{$data->entered_by}}</td>
                                <td>
                                    @if(Auth::check())
                                     @if(auth()->user()->is_admin)
                                    <a href={{"edit/".$data['id']}} class="btn btn-success">update</a>
                                    <br>
                                    <br>
                                    <a href={{"delete/".$data['id']}} class="btn btn-dark">Delete</a>
                                    </td>
                                    @endif
                                    @endif
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <h1>Games</h1>

    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">firstname</th>
                        <th scope="col">surname</th>
                        <th scope="col">Price</th>
                        <th scope="col">Length</th>
                        <th scope="col">Type</th>
                        <th scope="col">entered by</th>
                        @if(Auth::check())
                        @if(auth()->user()->is_admin)
                        <th scope="col">action</th>
                        @endif
                        @endif


                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $data)
                        @if($data->choice == 'game')
                            <tr>
                                <th scope="row">{{$data ->id}}</th>
                                <td>{{ $data->firstname }}</td>
                                <td>{{ $data->surname }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->papl }}</td>
                                <td>{{ $data->choice }}</td>
                                <td>{{$data->entered_by}}</td>
                                <td>
                                    @if(Auth::check())
                                     @if(auth()->user()->is_admin)
                                    <a href={{"edit/".$data['id']}} class="btn btn-success">update</a>
                                    <br>
                                    <br>
                                    <a href={{"delete/".$data['id']}} class="btn btn-dark">Delete</a>
                                    </td>
                                    @endif
                                    @endif
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

<hr style="height:2px;border-width:0;color:blue;background-color:blue">
@if (Auth::check())
@if(auth()->user()->is_admin)
<div class="padding container-fluid d-flex justify-content-center">
    <div class="col-md-6">
        <div class="free-quote bg-dark h-100">
            <h2 class="my-4 heading text-center-light">Insert data here!!!</h2>
             <form action="{{ route('create') }}" method="POST">
                @csrf

                <span><strong>Product Type:</strong></span>
                <select class="form-control btn-block-light" name="choice">
                    <option value="cd">CDs</option>
                    <option value="book">BOOk</option>
                    <option value="game">Game</option>
                </select><br>

                <input class="form-control btn-block" type="text" name="firstname" placeholder="First Name">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="surname" placeholder="Surname">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="price" placeholder="Price">
                <br>
                <br>
                <input class="form-control btn-block" type="text" name="papl" placeholder="Pages/Play Length">
                <br>
                <br>
                <button type="submit" name="" class="btn btn-success-dark">Submit</button>

            </form>

        </div>
    </div>
</div>
@endif
@endif
@endsection

