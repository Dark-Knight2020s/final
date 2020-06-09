@extends('layouts.app')
@section('title', 'Task List')


@section('content')
    <div class="row">
        <div class="col-md-4">
        <!-- MESSAGES -->
        <div class="col-md-10 offset-md-1 ">
            @include('layouts.flash-message')
        </div>

            @if (isset($product_edit))  

                <!-- Update Product FORM -->

                <div class="card card-body">
                    <form action="{{url('update/'.$product_edit->id)}}" method="POST">
                      @csrf
                      @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Product Title" value={{$product_edit->title}} autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Product Description">{{$product_edit->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Product Price" value={{$product_edit->price}} min="0">
                    </div>
                    <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
                    </form>
                </div>

            @else

                <!-- ADD Product FORM -->

                <div class="card card-body">
                    <form action="{{url('store')}}" method="POST">
                      @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Product Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Product Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Product Price" min="0">
                    </div>
                    <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
                    </form>
                </div>

            @endif

        </div>

        {{-- show products --}}
        @if (count($products) ?? '' > 0)
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>

                                    {{-- edit User --}}
                                    <form action="{{url('edit/'.$product->id)}}"method="POST">
                                        @method('GET')                                
                                        <button class="btn btn-secondary" type="submit"><i class="fas fa-marker"></i></button>       
                                    </form>
                                    <br>
                                    {{-- Delete User --}}
                                    <form action="{{url('delete/'.$product->id)}}" onclick="return confirm('Are you sure to delete user {{$product->title}}?')" method="POST">
                                        @csrf
                                        @method('DELETE')                                
                                        <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>       
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- If there isn't products ,sent message --}}
          <br>
          <div class="Message alert alert-info"  align="center">
            <h3><strong>OPPS !</strong> There are no products</h3>
          </div>

        @endif

    </div>

@endsection



    

    