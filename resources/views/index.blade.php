@include('layouts.header')
<div class="container-wrapper">
  <div class="row align-items-start">
    <div class="col-md-4">
      <h3>Create a product</h3>
      <div class="border-around sm-pad">
          <form action="{{route('store')}}" method="POST">
              @csrf
              <div class="form-group">
                 <div class="flex">
                   <b>
                     Product&nbsp;type:&nbsp;
                    </b>
                  <select class="form-control d-" id="porduct" name="type">
                    <option value="book">BOOK</option>
                    <option value="cd">CD</option>
                  </select>
                 </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="title" required>
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="firstname" placeholder="first name (optional)">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="sname" placeholder="surname / brand"require>
              </div>
              <div class="form-group">
                  <input type="number" class="form-control" name="price" placeholder="price" required>
              </div>
              <div class="form-group">
                  <input type="number" class="form-control" name="pageslenths" placeholder="page / length" required>
              </div>
              <button type="submit" class="btn btn-primary">ADD NEW</button>
            </form>
      </div>
    </div>
    <div class="col-md-4 ">
    <div class="border-around">
      <p class="text-center sm-margin-top">

        <b> BOOK</b>
      </p>
      <div class=" product-box">
        @foreach($bookproducts as $book)
        <div class="product-item">
            <p class="card-text">Title:&nbsp;{{$book['title']}}</p>
            <p class="card-text">First Name:&nbsp;{{$book['firstname']}}</p>
            <p class="card-text">Price: &nbsp;{{$book['price']}}</p>
            <p class="card-text">Pages: &nbsp;{{$book['numpages']}}</p>
            <a href="{{route('edit', $book['id'])}}" class="btn btn-primary">Select</a>
          </div>
        @endforeach
      </div>
    </div>
    </div>
    <div class="col-md-4 ">
    <div class="border-around">
    <p class="text-center sm-margin-top">
    <b> CD</b>
    </p>
    <div class=" product-box">

      @foreach($cdproducts as $cd)
      <div class="product-item">
        <p class="card-text">Title: &nbsp;{{$cd['title']}}</p>
        <p class="card-text">First Name: &nbsp;{{$cd['firstname']}}</p>
        <p class="card-text">Price: &nbsp;{{$cd['price']}}</p>
        <p class="card-text">Lenght: &nbsp;{{$cd['playlength']}}</p>
        <a href="{{route('edit', $cd['id'])}}" class="btn btn-primary">Select</a>
         
    </div>
      @endforeach
    </div>
    </div>
    </div>
  </div>
</div>
@include('layouts.footer')