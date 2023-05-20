@extends('layouts.frontend')
@section('content')

 <div class="m-2 ">

    <header class="text-center">
        <h3 class="text-2xl font-bold uppercase mb-1">
            Users
        </h3>
        <p class="mb-1">There are {{count($users) }} users.</p>
    </header>



    <table class="hover:table-fixed border-collapse border border-green-600 mx-auto">
        <thead>
          <tr>
            <th  class="border border-green-600 ">ID </th>
            <th  class="border border-green-600 "> Name </th>
            <th  class="border border-green-600 "> Email </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $val)

                <tr>
                    <td  class="border border-green-600 ">{{$val->id }}  </td>
                    <td  class="border border-green-600 ">{{$val["name"] }} </td>

                    <td  class="border border-green-600 ">{{$val->email }}  </td>


                    @if ($val->isAdmin==0)
                        <td class="border border-green-600">
                           <form method="POST" action="/manageusers/{{$val->id}}">
                              @csrf
                              @method('Delete')
                              <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                           </form>
                        </td>
                    @else
                        <td  class="border border-green-600 "> Not Delete </td>
                    @endif
                 </tr>


           @endforeach
        </tbody>
      </table>
      <div class="mt-6 p-4">
        {{$users->links()}}
      </div>
   </div>

@endsection






