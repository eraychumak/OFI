<header>
  @if (session("err-msg"))
    <div class="important" role="alert">
      {{ session("err-msg") }}
    </div>
  @endif

  <a href="/">Online Feedback Insight</a>

  @guest
  <div>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
  </div>
  @endguest

</header>