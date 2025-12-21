<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield("title","Admin Dashboard")</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/admin-layout.css') }}">
</head>

<body>

<!-- ===== Mobile Top Navbar ===== -->
<nav class="navbar navbar-dark d-lg-none px-3" style="background:#0a1f36;">
    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarNav">
        <i class="fa-solid fa-bars"></i>
    </button>
    <span class="navbar-brand fw-semibold">Admin Panel</span>
</nav>

<!-- ===== Main Wrapper ===== -->
<div class="d-flex">

    <!-- ===== Sidebar ===== -->
    <aside class="collapse d-lg-flex navbar-vertical" id="sidebarNav">

        <!-- Brand -->
        <div class="mb-4">
            <h4 class="text-white fw-bold mb-0">
                <i class="fa-solid fa-shield-halved text-primary me-2"></i>
                Admin
            </h4>
            <small class="text-secondary">Management Panel</small>
        </div>

        <!-- Navigation -->
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link {{ $page=="main" ? "active":" " }}" href="/dashboard">
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $page=="categories" ? "active":" " }}" href="{{ route('categories.index') }}">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $page=="meals" ? "active":" " }}" href="{{ route('meals.index') }}">
                    <i class="fa-solid fa-utensils"></i>
                    <span>Meals</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fa-solid fa-users"></i>
                    <span>View Website</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>

        <!-- Logout -->
        <div class="mt-auto pt-4">
           <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger w-100">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                Logout
            </button>
           </form>
        </div>
    </aside>

    <!-- ===== Content ===== -->
    <main class="content w-100">
        @yield("content")
    </main>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
