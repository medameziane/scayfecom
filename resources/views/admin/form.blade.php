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
        <div class="form-section">
          <div class="add-form">
            <div class="title">Add<i class="fa-solid fa-tags"></i></div>
            <div class="form-content">
              <form>
                <div class="form-details">
                  <div class="input-box">
                    <label for="tag-name" class="details">Input 1</label>
                    <input type="text" placeholder="add new tag" id="tag-name" required/>
                  </div>
                  <div class="input-box">
                    <label for="tag-name" class="details">Input 2</label>
                    <input type="file" id="tag-name" required/>
                  </div>
                  <div class="input-box">
                    <label for="tag-description" class="details">Input 3</label>
                    <textarea placeholder="Write Description here..." id="tag-description" required></textarea>
                  </div>
                  <div class="input-box">
                    <label class="details">Sélectionner les Labels</label>
                    <select required>
                      <option>Select Category</option>
                      <option>Label 1</option>
                      <option>Label 2</option>
                      <option>Label 3</option>
                    </select>
                  </div>
                  <div class="input-box">
                    <label class="details">Visibilité</label>
                    <select required>
                      <option>Public</option>
                      <option>Privée</option>
                    </select>
                  </div>
                  <div class="input-box">
                    <label class="details">Cet équipement est une pièce de rechange</label>
                    <input type="checkbox"/>
                  </div>
                  <div class="input-box">
                    <label class="details">Cet équipement est une pièce de rechange</label>
                    <input type="radio"/>
                  </div>
      
                </div>
                <div class="button">
                  <input type="submit" value="Add"/>
                  <input type="reset" value="Cancel"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='{{asset("admin/assets/js/main.js")}}'></script>
  </body>
</html>