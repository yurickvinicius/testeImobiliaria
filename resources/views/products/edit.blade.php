@extends('baseTemplate')

@section('content')
    <div class="container">

        @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif

        <h1>Create Product</h1>
        
        <div class="container">

            <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id}}">
                <div class="mb-3 col col-lg-3">
                    <label class="form-label">Code: </label>
                    <input class="form-control" type="text" name="code" value="{{ $product->code }}">
                </div>

                <div class="mb-3 col col-lg-6">
                    <label class="form-label">Name: </label>
                    <input class="form-control" type="text" name="title" value="{{ $product->title }}">
                </div>

                <div class="mb-3 col col-lg-2">
                    <label class="form-label">Valor R$:</label>
                    <input class="form-control monetaryBr" type="text" name="price" value="{{ $product->price }}">
                </div>

                <div class="mb-3 col col-lg-6">
                    <label class="form-label">Description: </label>
                    <textarea class="form-control" name="observation" cols="20" rows="3">{{ $product->observation }}</textarea>
                </div>

                <div class="mb-3 col col-lg-3">
                    <select name="category" class="form-select">
                        <option selected>{{ $product->category }}</option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Casa">Casa</option>
                        <option value="Terreno">Terreno</option>
                    </select>
                </div>

                <div class="mb-3 col col-lg-6">
                    <input class="form-control" type="file" name="image">
                </div>

                <input type="submit" value="Add Category" class="btn btn-primary">            

            </form>  
        
        </div>

    </div>   
@endsection