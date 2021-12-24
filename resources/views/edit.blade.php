@include('layouts.header')
<div class="card">
    <div class="col-md-3">
            <span>
                <b>EDIT</b>
            </span>
        <div class="float-right">    
            <a class="btn btn-danger float-right" href="{{route('delete', $shopproduct[0]['id'])}}">DELETE</a>
        </div>
            <form action="{{route('update', $shopproduct[0]['id'] )}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="hidden" class="form-control" name="type" value="{{$shopproduct[0]['type']}}">
                    <input type="text" class="form-control" name="title" value="{{$shopproduct[0]['title']}}" placeholder="title">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="firstname" value="{{$shopproduct[0]['firstname']}}" placeholder="first name (optional)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sname" value="{{$shopproduct[0]['mainname']}}" placeholder="surname / brand">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="price" value="{{$shopproduct[0]['price']}}" placeholder="price">
                </div>
                <div class="form-group">
                    @if($shopproduct[0]['type']=='book')
                        <input type="number" placeholder="pages / playlength" name="pagelengths" class="my-2 p-2 form-control border capitalize" value="{{$shopproduct[0]['numpages']}}"/>
                    @else
                        <input type="number" placeholder="pages / playlength" name="pagelengths" class="my-2 p-2 form-control border capitalize" value="{{$shopproduct[0]['playlength']}}"/>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>

            <div class="delete">
            </div>
    </div>
</div>
@include('layouts.footer')