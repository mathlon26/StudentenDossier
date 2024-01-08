
<style>

    .drop-shadow {
    box-shadow: 0 4px 4px 2px rgba(0, 0, 0, 0.25);
    }

    .drop-shadow-100 {
    box-shadow: 0 8px 4px 2px rgba(0, 0, 0, 0.25);
    }

    .inner-shadow {
    box-shadow: inset 0 -6px 4px 0 rgba(0, 0, 0, 0.25);
    }
</style>
<div class="container | drop-shadow-100 | login__container">
    <form id="login_form" action="authenticate" method="post">
        @csrf
        <img src="{{asset("img/uhasselt_logo_full.svg")}}" alt="Logo">
        <input placeholder="Student-ID" name="studentid" autocomplete="username" class="login_text_input drop-shadow" value="{{old('studentid')}}" type="text" id="studentid">
        @error('studentid')
        <p>{{$message}}</p>
        @enderror
        <input placeholder="{{__('login_password')}}" name="password" autocomplete="current-password" class="login_text_input drop-shadow" type="password" id="password">
        @error('password')
        <p>{{$message}}</p>
        @enderror
        {{--
        <label for="publicChecker">This is a public computer</label>
        <input id="publicChecker" type="checkbox">
            --}}
        
        <p>{{__('login_forgot')}} <br>{{__('login_click')}} <a class="red" href="">{{__('login_here')}}</a>.</br></p>
        
        <button name="login" type="submit" class="inner-shadow | red-bg white">Login</button>
        @error('login')
        <p>{{$message}}</p>
        @enderror
        <p>{{__('login_or')}} <a class="red" href="">App</a>.</p>
    </form>
</div>
