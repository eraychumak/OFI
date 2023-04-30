@extends("layouts.app")

@section("main")
<main>
  <header>
    <a class="goBack" href="/">Go back</a>
    <h1>Login</h1>
  </header>
  <form method="POST" action="/login">
    @csrf
    <div class="fields">
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
    </div>
    <button id="loginBtn" type="submit">Login</button>
  </form>
</main>
@endsection
