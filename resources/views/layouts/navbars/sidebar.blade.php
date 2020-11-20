<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('LeMarche') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
   
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <!-- <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('User Control') }}
            <b class="caret"></b>
          </p>
        </a> -->
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <!-- <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li> -->
            <!-- <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li> -->
          </ul>
        </div>
      


        <li class="nav-item{{ $activePage == 'listBanner' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('banner.listBanner') }}">
          <i class="material-icons">language</i>
            <p>{{ __('Banners') }}</p>
        </a>
      </li>

    

      <li class="nav-item{{ $activePage == 'listCity' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('city.listCity') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('City') }}</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'listCategory' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('category.listCategory') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Categories') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'listSubcategory' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('subcategory.listSubcategory') }}">
          <i class="material-icons">bubble_chart</i>
            <p>{{ __('Subcategories') }}</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'listAttribute' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('attribute.listAttribute') }}">
          <i class="material-icons">language</i>
            <p>{{ __('Attributes') }}</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'listProduct' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('product.listProduct') }}">
          <i class="material-icons">star</i>
            <p>{{ __('Products') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'listOrder' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('order.listOrder') }}">
          <i class="material-icons">shopping_cart</i>
            <p>{{ __('Orders') }}</p>
        </a>
      </li>

     

      
       <li class="nav-item{{ $activePage == 'listDboy' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dboy.listDboy') }}">
          <i class="info material-icons">accessibility_new</i>
            <p >{{ __('Delivery Boys') }}</p>
        </a>
      </li>
     
      <li class="nav-item{{ $activePage == 'listNotification' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notification.listNotification') }}">
          <i class="material-icons">notifications</i>
            <p>{{ __('Notifications') }}</p>
        </a>
      </li>
     
    </ul>
  </div>
</div>
