<nav class="auth top-level">
  <p class="noPrint"><span class="concise">Signed in as</span><br/>{{ Auth::user()->name }}</p>
  <a
    class="btn btnPlain noPrint"
    href="/logout"
    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
  >
    Logout
  </a>
  <form action="/logout" method="POST" id="logoutForm" style="display: none;">
    @csrf
  </form>
</nav>
