
<x-_dossier :pageName="$pageName">
    <div class="login-container-main" style="background-image: url('{{asset('/img/auth-bg.png')}}');">
        {{---<div class="goBack-container ">
            
            <a id="goBack" class="flex-group | black inner-shadow text-decoration-none" href="https://www.uhasselt.be/nl">
                <img class="img goBack-img" src="{{asset("img/favicon.png")}}" alt="Button Logo">
                <p>{{__('login_back')}}</p>
            </a>
        </div>--}}
        <x-login-form :lang="$lang"/>
    </div>
</x-_dossier>