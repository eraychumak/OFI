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

  @auth
    <p>Logged in as: {{ Auth::user()->name }}</p>
    <a
      href="/logout"
      onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
    >
      Logout
    </a>
    <form action="/logout" method="POST" id="logoutForm" style="display: none;">
      @csrf
    </form>
  @endauth
</header>