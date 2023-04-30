@extends("layouts.app")

@section("main")
<main>
  <h1>Login</h1>
  <form method="POST" action="/login">
    @csrf
    <div class="field">
      <label for="email">Email</label>
      <input id="email" type="text" name="email" required autocomplete="email"/>
      @error("email")
        <p class="important">{{ $message }}</p>
      @enderror
    </div>
    <div class="field">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required autocomplete="new-password"/>
      @error("password")
        <p class="important">{{ $message }}</p>
      @enderror
    </div>
    <div class="field">
      <input type="checkbox" name="remember" id="remember"/>
      <label for="remember">Remember me</label>
    </div>
    <button id="loginBtn" type="submit">Login</button>
  </form>
</main>
@endsection
