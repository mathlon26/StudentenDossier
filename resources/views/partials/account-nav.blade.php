@auth
<li>
    Welcome {{auth()->user()->name}} {{auth()->user()->lastname}}
    display name, avatar
</li>
@else
<li>
    display log in or something
</li>
@endauth