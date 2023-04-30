@extends("layouts.app")

@section("styles")
<style>
</style>
@endsection

@section("main")
<main>
  <header>
  <h1>Questionnaires</h1>
  @auth
    <a href="/questionnaires/create" id="createNewQuestionnaireBtn">Create a new questionnaire</a>
  @endauth
  </header>
  @foreach($questionnaires as $questionnaire)
    <div class="questionnaire">
      <h2>
        <a href="/questionnaires/{{ $questionnaire->id }}">{{ $questionnaire->title}}</a>
      </h2>
      @auth
        @can("update-questionnaire", $questionnaire)
          <p>You own this</p>
        @else
          <p>Created by: {{ $questionnaire->user->name}}</p>
        @endif
      @endauth
      @guest
        <p>Created by: {{ $questionnaire->user->name}}</p>
      @endguest
      <p>{{ $questionnaire->description }}</p>
    </div>
  @endforeach
</main>
@endsection
