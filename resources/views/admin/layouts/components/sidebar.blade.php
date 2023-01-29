<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kitchenstaff.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          Kitchen Staff
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('restaurantstaff.index') }}">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Restaurant Staff
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('menu.index') }}">
          <span data-feather="users" class="align-text-bottom"></span>
          Menu
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('reservations.index') }}">
          <span data-feather="bar-chart-2" class="align-text-bottom"></span>
          Reservation
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('payments.index') }}">
          <span data-feather="layers" class="align-text-bottom"></span>
          Payment
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('order_items.index') }}">
          <span data-feather="layers" class="align-text-bottom"></span>
          Order Item
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
          <span data-feather="layers" class="align-text-bottom"></span>
          Customer
        </a>
      </li>
    </ul>

  </div>
</nav>
