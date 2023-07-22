<nav class="nav bg-dark fixed-top mt-2">
    <div class="container-fluid">
        <div class="dropdown">
            <img src="assets/logo-only.png" alt="Warung Amel" style="width: 90px; height: 20px;"> 
            <a href="#" class="text-white" data-bs-toggle="dropdown"
                style="text-decoration:none;">Hello, {{auth()->user()->name}}</a>
            <ul class="dropdown-menu dropdown-menu-dark ">
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>