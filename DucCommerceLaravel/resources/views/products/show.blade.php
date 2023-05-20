@extends('layouts.frontend')
@section('content')


<div class="m-2">
    <h3 class="text-center text-2xl font-bold uppercase ">
        Product's Detail
    </h3>
    <div class="flex flex-col md:flex-row ">
        <img class="w-2/5 h-3/5 "
           src="{{$product->image_path ? asset($product->image_path )
           : asset('no-image.png')}}" alt="" />
        <div class="m-2">
            <p> <b> ID: </b>  {{$product["id"] }}  </p>
            <p> <b> Name: </b>  {{$product['name'] }}  </p>
            <p> <b> User's ID: </b>  {{$product["user_id"] }}  </p>
            <p> <b> User's Email: </b>  {{$product[ "user_email"] }}  </p>
            <p> <b> Description: </b>  {{$product[ "description"] }}  </p>
            <p> <b> Type: </b>  {{$product["type"] }}  </p>
            <p> <b> Price: </b> $ {{$product["price"] }}  </p>

            <p> <b> User's Tel: </b>  {{$product->user_tel }}  </p>
            <p> <b> City: </b> {{$product->city }}  </p>
            <div class="text-white text-center my-2 bg-green-600 hover:bg-green-800 rounded-lg w-24">
                <a
                   href="/products/edit/{{$product->id}}">
                   <i class="fa-solid fa-pencil"></i> Edit
                </a>
            </div>

            <form class="text-white text-center my-2 bg-red-600 hover:bg-red-800  rounded-lg w-24"
               method="POST" action="/products/{{$product->id}}">
                   @csrf
                @method('Delete')
                <button ><i class="fa-solid fa-trash"></i> Delete</button>
            </form>

        </div>

    </div>
</div>

@endsection






