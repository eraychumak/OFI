@extends("layouts.app")

@section("styles")
<style>
  .choices {
    display: flex;
    gap: 1rem;
    align-items: flex-end;
  }

  .choice {
    padding: 0 .5rem;
    text-align: center;
  }
  
  .choiceBar {
    position: relative;
    width: 100%;
    height: 100px;
    border-bottom: 1px solid black;
    background: rgba(0, 0, 0, .1);
  }
  
  .choiceBarBg {
    bottom: 0;
    position: absolute;
    width: 100%;
    background: rgba(255, 0, 0, .2);
  }
</style>
@endsection

@section("main")
<main>
  <header>
    <p>Questionnaire - Responses</p>
    <h1>{{ $questionnaire->title }}</h1>
    <p>Description: <i>{{ $questionnaire->description }}</i></p>
  </header>
  <a href="/questionnaires/{{ $questionnaire->id }}/edit">Go back</a>
  <h2>Respondents ({{ $questionnaire->respondents->count() }})</h2>
  @foreach($questionnaire->questions as $question)
    <div class="question">
      <h3>{{ $question->body }}</h3>
      <div class="choices">
        @foreach($question->choices as $choice)
        <div class="choiceContainer">
          <div class="choiceBar">
            <div class="choiceBarBg" style="height: {{ ($choice->responses->count() / 4) * 100 }}px;">
            </div>
          </div>
          <div class="choice">
            <p>{{ $choice->choice }}</p>
            <p>({{ $choice->responses->count() }})</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  @endforeach
</main>
@endsection
