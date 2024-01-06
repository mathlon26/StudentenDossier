<form class="d-flex" action="/{{app()->getLocale()}}/account/logout" method="post"">
    @csrf
    <button id="logout_btn" class="btn border-0" type="submit">
        <svg id="logout_btn_no_hover" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.99805 21V19H4.99805V4C4.99805 3.44772 5.44576 3 5.99805 3H17.998C18.5503 3 18.998 3.44772 18.998 4V19H20.998V21H2.99805ZM14.998 11H12.998V13H14.998V11Z" fill="rgba(29,29,27,1)"></path></svg>
        <svg id="logout_btn_hover" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M1.99805 21.0001V19.0001L3.99805 18.9999V4.83465C3.99805 4.35136 4.34367 3.93723 4.81916 3.85078L14.2907 2.12868C14.6167 2.0694 14.9291 2.28564 14.9884 2.61167C14.9948 2.64708 14.998 2.68301 14.998 2.719V3.9999L18.998 4.00007C19.5503 4.00007 19.998 4.44779 19.998 5.00007V18.9999L21.998 19.0001V21.0001H17.998V6.00007L14.998 5.9999V21.0001H1.99805ZM11.998 11.0001H9.99805V13.0001H11.998V11.0001Z" fill="rgba(29,29,27,1)"></path></svg>
        <p class="align-center justify-center m-0">Logout</p>
</form>