@extends('baseTemplate')

@section('content')


    @if(session('sucess'))
    <p class="alert alert-success">
        {{ session('sucess') }}
    </p>
    @endif
    @if(session('error'))
    <p class="alert alert-danger">
        {{ session('error') }}
    </p>
    @endif


    <div class="container">
        <h1>Products</h1>

        <br>
        <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>

        <table class="table">
            <tr>
                <th>Imagem</th>
                <th>Code</th>
                <th>Name</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Action</th>
            </tr>

            @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{ url("uploads/products/{$product->nameFile}") }}" width="80">
                    </td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->title }}</td>
                    <td>R$ {{ $product->price  }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('product.delete', ['id'=>$product->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>    
            @endforeach

        </table>

        {!! $products->render() !!}

    </div>   
@endsection

