<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Layout</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
  />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    rel="stylesheet"
  />

   <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

 <style>
 /* Base styles */
body {
  overflow-x: hidden;
  font-family: 'Montserrat', sans-serif;
  font-weight: 900;

  background-color: #fffaf5;
  color: #34241d;
}

#dashboard {
  margin-left: 50px;
  color: #FDF6E3;
}

/* Sidebar */
#sidebar {
  width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #A74F1F; /* Pumpkin brown */
  color: #FDF6E3;
  padding-top: 1rem;
  padding-bottom: 1rem;
  display: flex;
  flex-direction: column;
  transition: width 0.3s ease;
  z-index: 1040;
  box-shadow: 4px 0 12px rgba(0, 0, 0, 0.1);
}

#sidebar.collapsed {
  width: 70px;
}

/* Sidebar Brand */
.sidebar-brand {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0 1.5rem;
  margin-bottom: 3rem;
  user-select: none;
}

.sidebar-brand span {
  font-size: 1.5rem;
  font-weight: bold;
  letter-spacing: 1px;
  color: #FDF6E3;
}

#sidebar.collapsed .sidebar-brand span {
  display: none;
}

/* Nav Links */
#sidebar ul.nav-pills {
  flex-grow: 1;
  padding-left: 0;
  margin-bottom: 0;
  display: flex;
  flex-direction: column;
}

#sidebar ul.nav-pills li {
  width: 100%;
}

#sidebar ul.nav-pills li a {
  color: #FDF6E3;
  padding: 0.75rem 1.5rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-weight: 500;
  border-radius: 8px;
  transition: background-color 0.2s, color 0.2s;
  user-select: none;
}

#sidebar ul.nav-pills li a i {
  font-size: 1.25rem;
  min-width: 24px;
  text-align: center;
}

#sidebar ul.nav-pills li a:hover,
#sidebar ul.nav-pills li a.active {
  color: #fff;
  background-color: #8B3E1F;
  text-decoration: none;
}

#sidebar.collapsed ul.nav-pills li a span {
  display: none;
}

/* Logout link */
.logout-container {
  padding: 1rem 1.5rem;
  user-select: none;
}

.logout-link {
  color: #FDF6E3;
  font-weight: 500;
  gap: 0.5rem;
  text-decoration: none;
  display: flex;
  align-items: center;
  padding: 1rem 1rem;
  border-radius: 6px;
  transition: color 0.2s, background-color 0.2s;
  cursor: pointer;
}

.logout-link i {
  font-size: 1.25rem;
  min-width: 24px;
  text-align: center;
}

.logout-link:hover {
  background-color: #8B3E1F;
  color: #fff;
}

#sidebar.collapsed .logout-link span {
  display: none;
}

/* Toggle Button */
#sidebarToggle {
  position: fixed;
  top: 15px;
  left: 15px;
  z-index: 1101;
  border: 2px solid #A74F1F;
  color: #A74F1F;
  padding: 5px 10px;
  border-radius: 6px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s, color 0.3s;
  box-shadow: none;
}

#sidebarToggle:hover {
  background-color:#34241d;

}

/* Main Content */
#main-content {
  margin-left: 250px;
  padding: 2rem;
  transition: margin-left 0.3s ease;
  background-color: #fffaf5;
}

#sidebar.collapsed ~ #main-content {
  margin-left: 70px;
}

/* Modal Styling */
.modal-content {
  background-color: #fffaf5;
  color: #5C4033;
  border-radius: 12px;
  border: 1px solid #ead9c6;
}

.modal-header,
.modal-footer {
  border: none;
}

.btn-danger {
  background-color: #A74F1F;
  border-color: #A74F1F;
}

.btn-danger:hover {
  background-color: #8B3E1F;
  border-color: #8B3E1F;
}

.pagination .page-item.active .page-link {
    background-color:#7E6B58	 !important;
    border-color: #7E6B58	 !important;
    color: white !important; /* keep the text readable */
}

.pagination .page-link {
    color: #7E6B58	; /* optional: change normal page links to grey as well */
}

.pagination .page-link:hover {
    color: #615344	;
    background-color:#a18c77	; /* lighter grey on hover */
    border-color: #9c8772	;
}


  </style>

</head>
<body>

  <!-- Sidebar -->
 <!-- Sidebar -->
<nav id="sidebar" aria-label="Sidebar Navigation">
  <div class="sidebar-brand">
    <span id="dashboard">Dashboard</span>
  </div>

  <div class="text-center mb-5">
    <img src="{{ asset('logo.png') }}" alt="Logo" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
  </div>

  <ul class="nav nav-pills flex-column" role="menu">
    <li class="nav-item mb-3">
      <a href="{{ url('/dashboard/products/index') }}" class="nav-link {{ request()->is('dashboard/products*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i>
        <span>Products</span>
      </a>
    </li>
    <li class="nav-item mb-3">
      <a href="{{ url('/dashboard/orders/index') }}" class="nav-link {{ request()->is('dashboard/orders*') ? 'active' : '' }}">
        <i class="bi bi-cart"></i>
        <span>Orders</span>
      </a>
    </li>
    <li class="nav-item mb-3">
      <a href="{{ url('/dashboard/customers') }}" class="nav-link {{ request()->is('dashboard/customers*') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        <span>Customers</span>
      </a>
    </li>
  </ul>

  <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display:none;">
    @csrf
  </form>

  <a href="#" class="logout-link mt-auto" data-bs-toggle="modal" data-bs-target="#logoutModal" onclick="event.preventDefault();">
    <i class="bi bi-box-arrow-left"></i>
    <span>Logout</span>
  </a>
</nav>


  <!-- Toggle Button -->
  <button id="sidebarToggle" aria-label="Toggle Sidebar" type="button" title="Toggle Sidebar">
    <i class="bi bi-list fs-6"></i>
  </button>

  <!-- Main content -->
  <main id="main-content">
    {{ $slot }}
  </main>

  <!-- Logout Confirmation Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color:  #C9A66B; color:white;" data-bs-dismiss="modal">Cancel</button>
          <button
            type="button"
            class="btn"
            style="background-color: #8B2D28	; color :white;"
            onclick="document.getElementById('logout-form').submit();"
          >
            Yes, Log Out
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
  ></script>

  <script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
