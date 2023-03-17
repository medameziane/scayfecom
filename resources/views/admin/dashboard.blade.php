<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='{{asset("admin/assets/css/style.css")}}'>
  </head>
  <body>
    <div class="overly"></div>
    <div class="sidebar">
      <div class="logo-area">
        <i class="fa-solid fa-g"></i> <h1>_mao</h1>
      </div>
      <div class="sidebar-header">
      </div>
      <div class="menu-area">
        <ul class='nav-menu'> 
          <li class="nav-link">
            <a href="{{route('dashboard')}}"><span class="link-name"> <i class="fa-solid fa-house"></i>Dashboard</span></a>
          </li>
          <li class="nav-link drop-down">
            <a href="#">
              <span class="link-name"><i class="fa-solid fa-dumpster"></i>Ecommerce</span>
              <i class="fa-solid fa-chevron-right arrow"></i>
            </a>
            <ul class="drop-menu">
              <li class="drop-link"><a href="#">List Products</a></li>
              <li class="drop-link"><a href="#">Add Product</a></li>
              <li class="drop-link"><a href="#">Categories</a></li>
              <li class="drop-link"><a href="#">Sub Categories</a></li>
              <li class="drop-link"><a href="#">Orders</a></li>
            </ul>
          </li>
          <li class="nav-link drop-down">
            <a href="#">
              <span class="link-name"><i class="fa-solid fa-users"></i>Customers</span>
              <i class="fa-solid fa-chevron-right arrow"></i>
            </a>
            <ul class="drop-menu">
              <li class="drop-link"><a href="#">List Users</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="sidebar-footer">
        <a href="/" target="_blank" class="btn btn-primary">View Store</a>
      </div>
    </div>
    <div class="container-wrapper">
      <div class='header'>
        <div class="toggle-nav"><i class="fa-solid fa-bars toggle-sidebar"></i></div>
        <div class="header-items">
          <div class="header-user">
            <div class="user-logo"><img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-1.jpg" /></div>
            {{-- <div class="user-info">{{ Auth::user()->name }}</div> --}}
            <div class="user-drop-down">
              <ul class="user-items">
                <li class="user-item">Profile</li>
                <li class="user-item">
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
                </li>
              </ul>
            </div>
          </div>
          <div class="header-settings">
            <i class="fa-solid fa-gear settings-icon"></i>
            <div class="settings-area">
              <i class="fa-solid fa-xmark close-settings"></i>
              <div class="settings-header"><h2>Settings</h2></div>
              <div class="settings-content">
                <div class="box-settings">
                  <h3 class="title-header-setting">Theme</h3>
                  <div class="setting-content">
                    <div class="color-theme">
                      <ul>
                        <li><input type="radio" onclick="handleTheme('light')" id='light'name='theme'/></li>
                        <li><input type="radio" onclick="handleTheme('dark')" id='dark' name='theme'/></li>
                        <label for='light' onclick={handleLight()} class='theme light'>
                          <div class='theme-select'><span class="dot dot-light active"></span></div> Light Mode
                        </label>
                        <label for='dark' onclick={handleDark()} class='theme dark'>
                          <div class='theme-select'><span class="dot dot-dark"></span></div>Dark Mode
                        </label>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-settings">
                  <h3 class="title-header-setting">Main color</h3>
                  <div class="setting-content">
                    <div class="list-colors">
                      <ul class='colors'>
                        <li class="color" data-color="#3498db"></li>
                        <li class="color" data-color="#f06c00"></li>
                        <li class="color" data-color="#27ae60"></li>
                        <li class="color" data-color="#8e44ad"></li>
                        <li class="color" data-color="#ff9f1a"></li>
                        <li class="color" data-color="#2e9383"></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Start Content -->
      <div class="content-wrapper">
        <div class="header-content">
          <h2 class='title-content'>@yield('sub-header')</h2>
          <div class="date-area"><input type='date'/></div>
        </div>
        <div class="dashboard-section">     
            <div class="quick-res">
                <div class="quick-box">
                <div class="icon"><i class="fa-solid fa-users"></i></div>
                <span class="counter">10</span>
                <span class="quick-title"><a href="/gmao/tags.php">Total Users</a></span>
                </div>
                <div class="quick-box">
                <div class="icon"><i class="fa-solid fa-box-open"></i></div>
                <span class="counter">50</span>
                <span class="quick-title"><a href="#">Total Products</a></span>
                </div>
                <div class="quick-box">
                <div class="icon"><i class="fa-solid fa-tag"></i></div>
                <span class="counter">5</span>
                <span class="quick-title"><a href="#">Total Categories</a></span>
                </div>
            </div>

            <div class="latest-section">
                <div class="latest-users">
                <div class="box-content">
                    <div class="box-header"><h3>Latest 5 Users</h3><span><a href="/users">View more</a></span></div>
                    <div class="box-body">
                    <ul>
                        <li><a href="#">Mohammed</a></li>
                        <li><a href="#">Hamza</a></li>
                        <li><a href="#">Khaled</a></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>

            <div class="progress-section">
                <div class="box-content">
                <div class="box-header"><h3>Progress Title</h3><span><a href="/products-analitycs">View more</a></span></div>       
                <div class="box-body">
                    <div class='progress-item'>
                    <span class="progress-name">Smart Phones (5)</span>
                    <div class="progress-content">
                        <span class="progress-size" data-width ="50%"></span> 
                        <span class="progress-counter">50%</span>
                    </div>
                    </div>
                    <div class='progress-item'>
                    <span class="progress-name">Home Decoration (2)</span>
                    <div class="progress-content">
                        <span class="progress-size" data-width ="20%"></span> 
                        <span class="progress-counter">20%</span>
                    </div>
                    </div>
                    <div class='progress-item'>
                    <span class="progress-name">Handmade (7)</span>
                    <div class="progress-content">
                        <span class="progress-size" data-width ="70%"></span> 
                        <span class="progress-counter">70%</span>
                    </div>
                    </div>
                    <div class='progress-item'>
                    <span class="progress-name">Cars (9)</span>
                    <div class="progress-content">
                        <span class="progress-size" data-width ="90%"></span> 
                        <span class="progress-counter">90%</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="tasks-section">
                <div class="box-content">
                <div class="box-header"><h3>List Tasks</h3><span><a href="#">View more</a></span></div>
                <div class="box-body">
                    <ul class="list-tasks">
                    <li class="task">
                        <a href="#">
                        <div class="task-title"><span class="task-icon">Icon</span> Add new task one</div>
                        <span class="task-date">05/02/2022</span>
                        </a>
                    </li>
                    <li class="task">
                        <a href="#">
                        <div class="task-title"><span class="task-icon">Icon</span> Add new task two</div>
                        <span class="task-date">05/02/2022</span>
                        </a>
                    </li>
                    <li class="task">
                        <a href="#">
                        <div class="task-title"><span class="task-icon">Icon</span> Add new task three</div>
                        <span class="task-date">05/02/2022</span>
                        </a>
                    </li>
                    <li class="task">
                        <a href="#">
                        <div class="task-title"><span class="task-icon">Icon</span> Add new task four</div>
                        <span class="task-date">05/02/2022</span>
                        </a>
                    </li>
                    <li class="task">
                        <a href="#">
                        <div class="task-title"><span class="task-icon">Icon</span> Add new task five</div>
                        <span class="task-date">05/02/2022</span>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='{{asset("admin/assets/js/main.js")}}'></script>
  </body>
</html>