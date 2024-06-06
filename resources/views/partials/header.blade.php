<header class="shadow-sm">
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <div class="mx-3" id="sidebar-toggle" role="button">
          <i class="fa-solid fa-bars"></i>
        </div>
        <div class=" none-1 mx-3" id="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search"/>
        </div>
      </div>

   

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row ">

        <li class="nav-item">
          <a
            class="nav-link me-3 me-lg-0"
            href="#">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
        </li>

       
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="#">
            <i class="fab fa-github"></i>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" title="Logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          {{-- <li class="nav-item "> --}}
            <a class="nav-link d-flex align-items-center" href="#" id="userProfile" role="button">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
              {{-- <img class="img-profile rounded-circle" src="/images/user.webp"> --}}
              <div id="user-image" class="img-profile rounded-circle">
                <span>{{Auth::user()->name[0]}}</span>
              </div>
            </a>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

</header>



<style lang="scss" scoped>
    #search-container{
     position: relative;
      input{
          padding-left:25px;
          border: none;
          border-bottom: 2px solid #0C7CEC;
          outline: none;
          width: calc(100% - 25px);
          font-size: 15px;
          background-color: transparent;
      }
      i{
          position: absolute;
          top: 2px;
          left: -8px;
          font-size: 18px;
          color: black;
      }
  }
</style>