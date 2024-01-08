<style>
    .navto-dropdown-menu {
        transform: translateX(-25%);
        padding: 0;
        background-color: var(--white);
    }
    .navto-dropdown-menu a {
        display: block;
        transform: translateY(25px)
    }
    .navto-dropdown-menu li {
        border-radius: 5px;
        height: 50px;
    }

    .navto-dropdown-item {
        height: 20px;
        color: var(--black);
    }

    .navto-dropdown-item:hover {
        background-color: rgba(0, 0, 0, 0);
        color: rgb(224, 49, 49);
    }

    .navto-dropdown-icon {
        margin-right: 25px;
        margin-left: 10px;
        color: var(--black);
        position: relative;
    }

    .navto-dropdown-item .navto-dropdown-icon {
        transition: transform 0.3s ease-out;
    }

    .navto-dropdown-item:hover .navto-dropdown-icon {
        color: var(--red);
        transform: translateX(15px);
    }

    @media only screen and (max-width: 990px) {
        .navto-dropdown-toggle {
            position: absolute;
            top: 0;
        }
        .navto-dropdown-menu {
            transform: translateY(10%);
        }
        .navto-dropdown-menu a {
            display: block;
            transform: translateY(10px)
        }
    }
</style>

<li class="nav-item dropdown">
    <a class="nav-link navto-dropdown-toggle dropdown-toggle" id="goto-dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{__('dossier_nav_navigate')}}
    </a>
    <ul class="dropdown-menu navto-dropdown-menu" aria-labelledby="navbarDropdown1">
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-user-graduate fa-lg"></i>Persoonlijke Gegevens</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-graduation-cap fa-lg"></i>Studie</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-dna fa-lg"></i>Onderwijsevaluatie</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-calendar-days fa-lg"></i>Uurrooster / Examenrooster</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-briefcase fa-lg"></i>Jobstudent Portaal</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-school fa-lg"></i>Studentenvoorzieningen</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-user-pen fa-lg"></i>Inschrijvingen</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-brands fa-uncharted fa-lg"></i>Software / Hardware</a></li>
        <li><a class="dropdown-item navto-dropdown-item" href="#"><i class="navto-dropdown-icon fa-solid fa-rocket fa-lg"></i>Studentenstartup</a></li>
    </ul>
</li>