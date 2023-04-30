<nav class="top-level">
  @if(str_contains(url()->current(), "register"))
    <a class="btn btnAccent" href="/login">Login</a>
  @elseif(str_contains(url()->current(), "login"))
    <a class="btn btnAccent" href="/login">Login</a>
    <a class="btn btnAccent" href="/register">Register</a>
  @else
    <a class="btn btnAccent" href="/login">Login</a>
    <a class="btn btnAccent" href="/register">Register</a>
  @endif
</nav>
