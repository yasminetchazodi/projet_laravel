<header>
    <div class="my-nav">
        <div class="container">
            <div class="row">
                <div class="nav-items">
                    <div class="menu-toggle"></div>
                    <div class="logo">
                        <img src="assets/images/logo-01.png">
                    </div>
                    <div class="menu-items">
                        <div class="menu">
                            
                            <ul>
                                <li><a href="{{ route('home') }}">Accueil</a></li>
                                <li><a href="{{ route('liste') }}">Liste</a></li>
                                <li><a href="{{ route('ranking') }}">Classement</a></li>
                                <li>   @auth
                                    <a href="{{ route('profile.update') }}">Profil</a>
                                @endauth </li>
                                                      
                                    
                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>