<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 10%;
        left: 100%;
        margin-top: -1px;
    }

    .navbar-nav li:hover>ul.dropdown-menu {
        display: block;
    }
</style>

@if(session("user"))
    <nav class="navbar navbar-expand-lg navbar-dark bg-{{session("user")->color}}">
@else
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">    
@endif
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            @if (Storage::disk('public')->exists('logos/logo.png'))
            <img src="{{ asset('storage/logos/logo.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
        @endif Construction Insight</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            aria-current="page" href="/login">Ask An Expert</a>
                    </li>
                    @if(session("user"))
                    
                    @if (session('user')->role=="admin" || session("user")->role=="datamanager")
                        <li class="nav-item dropdown ">
                            <a href="#" id="menu" data-bs-toggle="dropdown"
                                class="nav-link active dropdown-toggle" data-bs-display="static">Control Panel</a>
                            <ul class="dropdown-menu  ">
                                <li class="dropdown-submenu ">
                                    <a href="#" data-bs-toggle="dropdown"
                                        class="dropdown-item dropdown-toggle">Data Management</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/allmaterial" class="dropdown-item">Material</a>
                                        </li>
                                        <li>
                                            <a href="/allresource" class="dropdown-item">Resource</a>
                                        </li>
                                        <li>
                                            <a href="/allservice" class="dropdown-item">Service</a>
                                        </li>
                                         <li>
                                            <a href="/allequipment" class="dropdown-item">Equipment</a>
                                        </li>
                                        <li>
                                            <a href="/alldocument" class="dropdown-item">Reference</a>
                                        </li>
                                         <li>
                                            <a href="/allgallery" class="dropdown-item">Gallery</a>
                                        </li>
                                    </ul>
                                </li>
                                @if(session("user")->role=="admin")
                                <li class="dropdown-submenu">
                                    <a href="#" data-bs-toggle="dropdown"
                                        class="dropdown-item dropdown-toggle">User Management</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/adduser" class="dropdown-item">Add User</a>
                                        </li>
                                        <li>
                                            <a href="/alluser" class="dropdown-item">All Users</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" data-bs-toggle="dropdown"
                                        class="dropdown-item dropdown-toggle">Questions and Answers</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/allaskexpert" class="dropdown-item">Ask An Expert</a>
                                        </li>
                                        <li>
                                            <a href="/allgetquote" class="dropdown-item">Get a Qoute</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" data-bs-toggle="dropdown"
                                        class="dropdown-item dropdown-toggle">Settings</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/allbackgroundpic" class="dropdown-item">Background Images</a>
                                        </li>
                                        <li>
                                            <a href="/logo_change" class="dropdown-item">Change Logo</a>
                                        </li>
                                        {{-- <li>
                                            <a href="/allgetquote" class="dropdown-item">Logo</a>
                                        </li> --}}
                                        <li>
                                            <a href="/allcurrencyconversion" class="dropdown-item">Currency Conversion</a>
                                        </li>
                                        <li>
                                            <a href="/allsearchkeyword" class="dropdown-item">Search Keywords</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a href="#" data-bs-toggle="dropdown"
                                        class="dropdown-item dropdown-toggle">Privacy and Security</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/allbackgroundpic" class="dropdown-item">Privacy Policy</a>
                                        </li>
                                       



                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @endif
                        {{-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/allmaterial">All Material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/allresource">All Resource</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/allservice">All Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/alluser">All Users</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/allbackgroundpic">All BG</a>
                        </li> --}}




                        @if(session("user"))
                        <li class="nav-item">


                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ session('user')->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/updateprofile">Profile</a></li>
                                <li><a class="dropdown-item" href="/usersearchhistory">Search History</a></li>
                                <li><a class="dropdown-item" href="/module-names">Module Names</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/usercolorscheme">Color Scheme</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/register">Register</a>
                        </li>
                    @endif
                </ul>
                {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> --}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ask Expert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/expertquery">
                        @csrf
                        @if (session('user'))
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" value={{ session('user')->email }} readonly
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                        @else
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Your Query</label>
                            <textarea name="question" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>



</nav>


<script>
    let dropdowns = document.querySelectorAll('.dropdown-toggle')
    dropdowns.forEach((dd) => {
        dd.addEventListener('click', function(e) {
            var el = this.nextElementSibling
            el.style.display = el.style.display === 'block' ? 'none' : 'block'
        })
    })
</script>
