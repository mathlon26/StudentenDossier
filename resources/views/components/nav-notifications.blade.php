<style>
    
    #nav-notifications * {
        min-height: 45px;
    }
    #nav-notifications .badge {
        min-height: 0px;
    }
    .notif-dropdown-menu li a {
        min-height: 70px;
    }

    .notif-dropdown-menu a {
        padding: 0px 10px 0px 10px;
        margin: 0;
        max-height: 50px !important;
        justify-content: left !important;
    }

    @media only screen and (max-width: 990px) {
        #nav-notifications {
            display: none;
        }
    }
</style>

<li class="nav-item dropdown" id="nav-notifications">
    <a class="nav-link dropdown-toggle" href="#" id="notif-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
        {{__('dossier_nav_notifications')}}
        <span class="badge badge-danger badge-counter" id="alertCount">6</span>
    </a>
    
    <ul class="dropdown-menu notif-dropdown-menu" id="navbarDropdown2" aria-labelledby="navbarDropdown2">
        <li><a class="dropdown-item notif-dropdown-item" href="#">#1 Melding</a></li>
        <li><a class="dropdown-item notif-dropdown-item" href="#">#2 Melding</a></li>
        <li><a class="dropdown-item notif-dropdown-item" href="#">#3 Melding</a></li>
        <li><a class="dropdown-item notif-dropdown-item" href="#">#4 Melding</a></li>
        <li><a class="dropdown-item notif-dropdown-item" href="#">#5 Melding</a></li>
        <li><a class="dropdown-item notif-dropdown-item" href="#">#6 Melding</a></li>

    </ul>
    
</li>
