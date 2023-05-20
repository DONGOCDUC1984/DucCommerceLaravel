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

        .topnav {
          overflow: hidden;
          background-color: #333;
          top:0cm;
          position: fixed;
          z-index: 1;
          width: 100%;
        }

        .topnav a {
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        /* .active {
          background-color: green;
          color: white;
        } */

        .topnav .icon {
          display: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 17px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .dropdown-content {
          display: none;
          position: fixed;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .topnav a:hover, .dropdown:hover .dropbtn {
          background-color: green;
          color: white;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
          color: black;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }

        @media screen and (max-width: 600px) {
          .topnav a:not(:first-child), .dropdown .dropbtn {
            display: none;
          }
          .topnav a.icon {
            float: right;
            display: block;
          }
        }

        @media screen and (max-width: 600px) {
          .topnav.responsive {position: fixed;}
          .topnav.responsive .icon {
            position: fixed;
            right: 0;
            top: 0;
          }
          .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
          }
          .topnav.responsive .dropdown {float: none;}
          .topnav.responsive .dropdown-content {position: fixed;}
          .topnav.responsive .dropdown .dropbtn {
            display: block;
            width: 100%;
            text-align: left;
          }
        }
        </style>
</head>
<body>
    <div class="topnav" id="myTopnav">
        <span id="OpenOffCanvasButton" style="font-size: 20px; cursor: pointer;
        float: left;color:white;margin:10px; " onclick="openNav()"
        >&#9776</span
        >

        <a href="/" class="active">
          <i class="fa fa-fw fa-home"></i> Home
        </a>

        <div class="dropdown">
            <button class="dropbtn"> Product
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/products?tag=jeans">Jeans</a>
                <a href="/products?tag=shirt">Shirt</a>

            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn"> Filter Price
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/products?price=0 10"> $0-$10</a>
                <a href="/products?price=10 20"> $10-$20 </a>
                <a href="/products?price=20 30"> $20-$30</a>

            </div>
        </div>
        @auth
         <a href="/products/create"> Post Product </a>
         @if (Auth::user()->isAdmin == 1)
            <div class="dropdown">
                <button class="dropbtn"> Admin
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="/manageusers"> Manage Users</a>

                </div>
            </div>

          @endif

          <div class="dropdown">
            <button class="dropbtn"><i class="fa-solid fa-user"></i> {{Auth::user()->name  }}
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="/user/profile">My Profile</a>
              <a href="/products/manage">My Products</a>
              <div class="hover:text-white">
                 <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                 </form>
              </div>
            </div>
          </div>
        @endauth

        @guest
        <a href="/login"> Login </a>
        <a href="/register"> Register</a>
        @endguest

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
      </div>



      <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        var y=document.getElementById("OpenOffCanvasButton");

        if (x.className === "topnav") {
          x.className += " responsive";
          y.style.display ="none";
        } else {
          x.className = "topnav";
          y.style.display ="block";
        }


      }
      </script>
</body>
</html>
