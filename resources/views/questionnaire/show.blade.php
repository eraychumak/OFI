@extends("layouts.app")

@section("main")
<main>
  <header>
    <p>Questionnaire</p>
    <h1>{{ $questionnaire->title }}</h1>
    <p>Description: <i>{{ $questionnaire->description }}</i></p>
  </header>
  @auth
    @can("update-questionnaire", $questionnaire)
      <a href="/questionnaires/{{ $questionnaire->id }}/edit">View as admin</a>
    @endcan
  @endauth
  <h2>Questions</h2>
  <form action="/questionnaires/{{ $questionnaire->id }}/submit" method="post">
    @csrf
    @foreach($questionnaire->questions as $key=>$question)
      <div class="question">
        <h3>{{ $key + 1 }}. {{ $question->body}}</h3>
        <fieldset>
          <legend>Select your answer:</legend>
          @foreach($question->choices as $choice)
            <div class="radioField">
              <input
                type="radio"
                name="choices[{{ $key }}][choice_id]" id="{{ $choice->id }}"
                value="{{ $choice->id }}"
                {{ old("choices." . $key . ".choice_id") == $choice->id ? "checked" : ""}}
              />
              <input type="hidden" name="choices[{{ $key }}][question_id]" value="{{ $question->id }}"/>
              <label for="{{ $choice->id }}">{{ $choice->choice }}</label>
            </div>
          @endforeach
        </fieldset>
        @error("choices." . $key . ".choice_id")
          <p class="important">{{ $message }}</p>
        @enderror
      </div>
    @endforeach
    <a href="/">Withdraw/Cancel</a>
    <button type="submit">Submit responses</button>
  </form>
</main>
@endsection
