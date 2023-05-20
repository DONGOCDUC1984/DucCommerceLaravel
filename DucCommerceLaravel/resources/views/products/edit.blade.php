@extends('layouts.frontend')
@section('content')

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1"> Edit Product</h2>
    <p class="mb-4">Edit this product to find customers</p>
  </header>

  <form method="POST" action="/products/update/{{$product->id}}" enctype="multipart/form-data"
  class="mx-3 w-full md:w-1/2"
  >
    @csrf
    @method("PUT")
    <div class="mb-6">
      <label for="name" class="inline-block text-lg mb-2">Name</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
      value="{{$product->name}}" required placeholder="Name" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          required placeholder="Description">{{$product->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>


    <div class="mb-6">
        <label for="type" class="inline-block text-lg mb-2">
          Type
        </label>
        <input type="type" class="border border-gray-200 rounded p-2 w-full" name="type"
         value="{{$product->type}}" required placeholder="Type" />


        @error('type')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
      <label for="price" class="inline-block text-lg mb-2"> Price</label>
      <input type="number" step="0.01" class="border border-gray-200 rounded p-2 w-full" name="price"
        required placeholder="Price" value="{{$product->price}}"  />

      @error('price')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
        <label for="image" class="inline-block text-lg mb-2">
            Image
        </label>
        <input type="file"  accept="image/*" class="border border-gray-200 rounded p-2 w-full"
        name="image" required />

        @error('image')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
      <label for="user_tel" class="inline-block text-lg mb-2">Tel</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="user_tel"
       required placeholder="Telephone Number" value="{{$product->user_tel}}"  />

      @error('user_tel')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
        <label for="city" class="inline-block text-lg mb-2">
          City
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="city"
         value="{{$product->city}}" required placeholder="City" />


        @error('city')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
      <button type="submit" class="bg-green-600 text-white rounded py-2 px-4 hover:bg-black">
        Update
      </button>

      <a href="/" class="text-black ml-4"> Back </a>
    </div>
  </form>
@endsection
