<nav id="sidebar" class="bg-dark navbar-dark">
  <a href="/" class="nav-link" id="big-logo">
    <h2 class="p-2"><i class="fa-solid fa-square-rss"></i>
      <span> Boolpress</span></h2>
  </a>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}"> <i class="fa-solid fa-house-chimney fa-lg fa-fw"></i>
        <span>Home</span>
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link  {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
          <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
           <span>
             Dasboard
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link   {{Route::currentRouteName() == 'admin.posts.index' ? 'active' : ''}}" href="{{route('admin.posts.index')}}"> <i class="fa-solid fa-newspaper fa-lg fa-fw"></i>
          <span> Posts</span>
        </a>
      </li>

      <div class="nav-item collapsed" id="other-pages" data-bs-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
        <a class="nav-item ">
          <span class="menu-title">Pages</span>
          <i class="fa fa-angle-left menu-arrow"></i>
          <i class="fa fa-th menu-icon"></i>
        </a>
      </div>
     
      <div class="collapse" id="page-layouts"  >
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.tags.index' ? 'active' : ''}}"
            href="{{route('admin.tags.index')}}"><i class="fa-solid fa-tags fa-lg fa-fw"></i>
              <span> Tags</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'admin.categories.index' ? 'active' : ''}}"
            href="{{route('admin.categories.index')}}"><i class="fa-solid fa-list fa-lg fa-fw"></i>
              <span> Categories</span></a>
        </ul>
      </div>
      
    </ul>
</nav>