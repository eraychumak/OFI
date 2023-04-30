@extends("layouts.app")

@section("main")
<main>
    <header>
      <a class="goBack" href="/">Go back</a>
      <h1>Register</h1>
    </header>
    <form method="POST" action="/register">
        @csrf
        <div class="fields">
          <div class="field">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required autocomplete="name"/>
            @error("name")
              <p class="important">{{ $message }}</p>
            @enderror
          </div>
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
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"/>
          </div>
        </div>
        <button id="registerBtn" type="submit">Register</button>
    </form>
</main>
@endsection
