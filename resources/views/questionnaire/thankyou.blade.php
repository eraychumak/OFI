@extends("layouts.app")

@section("main")
<main>
  <header>
    <p class="tag">Questionnaire</p>
    <h1>{{ $questionnaire->title }}</h1>
  </header>
  <p>Thank you for completing the questionnaire.</p>
  <a href="/">Go to the home page</a>
</main>
@endsection
