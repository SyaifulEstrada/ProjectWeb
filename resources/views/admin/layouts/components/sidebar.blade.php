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
        <a class="nav-link" href="#">
          <span data-feather="bar-chart-2" class="align-text-bottom"></span>
          Reports
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="layers" class="align-text-bottom"></span>
          Integrations
        </a>
      </li>
    </ul>

    <h6
      class="sidebar-heading d-flex justify-content-between align-items-center text-muted text-uppercase mt-4 mb-1 px-3">
      <span>Saved reports</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle" class="align-text-bottom"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Year-end sale
        </a>
      </li>
    </ul>
  </div>
</nav>
