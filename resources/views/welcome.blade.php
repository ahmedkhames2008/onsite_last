<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Restaurant Menu</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root{
  --bg:#0b0f19;
  --card:#12172a;
  --border:#1f2640;
  --primary:#7c7cff;
  --accent:#22d3ee;
  --text:#e5e7eb;
  --muted:#9ca3af;
}

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins',sans-serif;
}

body{
  background:
    radial-gradient(circle at 20% 10%,#1b2040,transparent 40%),
    radial-gradient(circle at 80% 80%,#0e7490,transparent 35%),
    var(--bg);
  color:var(--text);
  min-height:100vh;
}


.navbar{
  display:flex;
  justify-content:flex-end;
  padding:22px 6%;
}

.navbar a{
  display:flex;
  align-items:center;
  gap:8px;
  text-decoration:none;
  color:var(--text);
  padding:10px 18px;
  border-radius:14px;
  background:rgba(255,255,255,.04);
  border:1px solid var(--border);
  transition:.35s;
}

.navbar a:hover{
  background:linear-gradient(135deg,var(--primary),var(--accent));
  color:#020617;
}

.header{
  text-align:center;
  padding: 10px 50px;
}

.header h1{
  font-size:48px;
  font-weight:700;
  background:linear-gradient(135deg,var(--primary),var(--accent));
  -webkit-background-clip:text;
  color:transparent;
}

.header p{
  margin-top:12px;
  color:var(--muted);
  font-size:15px;
}

.container{
  width:90%;
  margin:auto;
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
  gap:32px;
  padding-bottom:80px;
}

.card{
  background:linear-gradient(180deg,#151a32,#0f1428);
  border:1px solid var(--border);
  border-radius:24px;
  overflow:hidden;
  box-shadow:0 30px 60px rgba(0,0,0,.6);
  transition:.45s ease;
}

.card:hover{
  transform:translateY(-14px);
  box-shadow:
    0 0 0 1px rgba(124,124,255,.6),
    0 40px 90px rgba(0,0,0,.9);
}

.card img{
  width:100%;
  height:210px;
  object-fit:cover;
  filter:saturate(1.1) brightness(.9);
}

.card-body{
  padding:24px;
}

.card-body h3{
  display:flex;
  align-items:center;
  gap:10px;
  font-size:20px;
  font-weight:600;
  margin-bottom:10px;
}

.card-body p{
  font-size:14px;
  color:var(--muted);
  margin-bottom:20px;
  line-height:1.6;
}

.card-footer{
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.price{
  display:flex;
  align-items:center;
  gap:6px;
  font-size:20px;
  font-weight:600;
  color:var(--accent);
}
.no-meal{
    grid-column: 1/-1;
            text-align:center;
            padding: 20px 10px;
            border-radius: 18px;
            background:linear-gradient(135deg,var(--primary),var(--accent));
            border: 1px solid #1f2640;
            box-shadow: 0 30px 60px rgba(0,0,0,.6);
            color: #e5e7eb;
            font-size: 18px;
            font-weight: 600;
}

.categories a.filter-btn{
  background: rgba(255,255,255,0.05);
  color: var(--text);
  border: 1px solid var(--border);
  padding:10px 20px;
  margin: 0 6px;
  border-radius: 14px;
  text-decoration: none;
  font-weight: 500;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.35s ease;
  backdrop-filter: blur(10px);
}

.categories a.filter-btn:hover{
  background: linear-gradient(135deg, var(--primary), var(--accent));
  color: #020617;
  transform: scale(1.05);
}

.categories a.filter-btn.active{
  background: linear-gradient(135deg, var(--primary), var(--accent));
  color: #020617;
  box-shadow: 0 5px 15px rgba(124,124,255,0.5);
}

.btn{
  display:flex;
  align-items:center;
  gap:8px;
  padding:10px 22px;
  border-radius:16px;
  text-decoration:none;
  font-size:14px;
  font-weight:500;
  background:linear-gradient(135deg,var(--primary),var(--accent));
  color:#020617;
  transition:.35s;
}

.btn:hover{
  transform:scale(1.07);
}

.icon{
  color:var(--primary);
}
</style>
</head>

<body>

<header class="navbar">
@if (Route::has('login'))
  @auth
    <a href="{{ url('/dashboard') }}">
      <i class="fa-solid fa-chart-line"></i>
      Dashboard
    </a>
  @else
    <a href="{{ route('login') }}">
      <i class="fa-solid fa-right-to-bracket"></i>
      Login
    </a>
    @if (Route::has('register'))
      <a href="{{ route('register') }}">
        <i class="fa-solid fa-user-plus"></i>
        Register
      </a>
    @endif
  @endauth
@endif
</header>


<section class="header">
    <h1><i class="fa-solid fa-utensils"></i> Restaurant Menu</h1>
    <p>Premium meals crafted for modern taste</p>
</section>
<section class="header">
    <div class="categories " style="margin: 10px 0 20px 0" >
        <a href="/" class="filter-btn">All</a>
        @foreach($categories as $category)
            <a href="{{ route('category.filter', $category->id) }}" class="filter-btn">{{ $category->name }}</a>
        @endforeach
    </div>
    
    <script>
    const buttons = document.querySelectorAll(".filter-btn");
    const currentUrl = window.location.href;
    
    buttons.forEach(btn => {
        if(btn.href === currentUrl) {
            btn.classList.add("active");
        }
    });
    </script>
    
  </section>
  <section class="container">
    @forelse ($meals as $meal)
        <div class="card">
            <img src="{{ asset('storage/' . $meal->image) }}" alt="Meal">
            <div class="card-body">
                <h3>
                    <i class="fa-solid fa-burger icon"></i>
                    {{ $meal->name }}
                </h3>
                <p>{{ $meal->description }}</p>
                <div class="card-footer">
                    <span class="price">
                        <i class="fa-solid fa-tag"></i>
                        {{ $meal->price }} EGP
                    </span>
                    <a class="btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Order
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center alert alert-primary no-meal">
            <i class="fa-solid fa-wrench" ></i>
            Our Menu Is Under Updating
        </div>
    @endforelse
</section>


</body>
</html>
