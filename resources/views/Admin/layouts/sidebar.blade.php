<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.home')}}">
          <i class="bi bi-grid"></i>
          <span>Doanh thu</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.users')}}" style="background: none; color: #012b73">
          <i class="bi bi-grid"></i>
          <span>Quản lí tài khoản</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.orders')}}" style="background: none; color: #012b73">
          <i class="bi bi-grid"></i>
          <span>Quản lí đơn hàng</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Quản lí sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.product.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.product.create')}}">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Quản lí thương hiệu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.brand.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách thương hiệu</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.brand.create')}}">
              <i class="bi bi-circle"></i><span>Thêm thương hiệu</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->
