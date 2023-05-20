{{-- This version of navbar can work --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {margin:0;font-family:Arial}

        #search-form {
            position: fixed;
            top: 0cm;
            display: flex;
            height: 150px;
            flex-wrap: wrap;
            align-content: flex-end;
            }

        #search-form div , #search-form form  {
                margin-left: auto;
                margin-right: auto;
            }

    </style>
</head>
<body>

    <div id="search-form" class="bg-green-600 p-1 w-full h-32">

        <div class="flex flex-row">
            <img class="ml-4 mb-2 w-12 h-12"
                  src="{{ asset('ecommerce1.png')}}" alt="" />
            <span class="text-2xl text-white mx-3 font-bold font-serif uppercase"> DUC-COMMERCE  </span>
        </div>
        <form action="/products" >
            <input class="w-72 py-1 pl-3 pr-10 rounded-full focus:outline-0" type="text" placeholder="Search.."
                name="search">
            <button class="-ml-8 border-6 bg-trasparent" type="submit"><i
                    class="fa fa-search text-gray-400"></i></button>
        </form>
    </div>






</body>
</html>
