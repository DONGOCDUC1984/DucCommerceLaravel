@extends('layouts.frontend')
@section('content')

 <div class="m-2">

    <h3 class="text-center text-2xl font-bold uppercase">
        Products
    </h3>
    @if (count($products)==0 )
        <p>There are no products. </p>
    @endif
    <div class="flex flex-wrap justify-center">
      @foreach ($products as $val)
         <a class="text-white bg-green-600 hover:bg-green-800 rounded-lg m-3"
      href="/products/{{$val["id"]}}">
           <div class="mx-2">
              <p>ID: {{$val->id }} </p>
              <img class="w-60 h-80"
              src="{{$val->image_path ? asset($val->image_path )
              : asset('no-image.png')}}" alt="" />
              <p>Name: {{$val->name }}   </p>
              <p>Price: $ {{$val->price }}    </p>
           </div>
         </a>

      @endforeach
    </div>
    <div class="mt-6 p-4 ">
        {{$products->links()}}
    </div>
   </div>

@endsection






