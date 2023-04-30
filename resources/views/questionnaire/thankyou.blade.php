@extends("layouts.app")

@section("main")
<main>
  <header>
    <p>Questionnaire</p>
    <h1>{{ $questionnaire->title }}</h1>
    <p>Description: <i>{{ $questionnaire->description }}</i></p>
  </header>
  <p>Thank you for submitting your response to the questionnaire</p>
  <a href="/">Go to the home page</a>
</main>
@endsection
