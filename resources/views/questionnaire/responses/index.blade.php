@extends("layouts.app")

@section("styles")
<style>
  .desc {
    margin: 1rem 0;
    line-height: 1.5rem;
  }

  #btnPrint {
    margin-bottom: 1rem;
  }

  .questions {
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  .choices {
    display: flex;
    flex-direction: column;
    gap: .5rem;
    margin: 1rem 0;
  }

  .bars {
    display: flex;
    gap: 1rem;
    align-items: flex-end;
    max-width: 50%;
  }

  .barColumn {
    flex: 1;
  }

  .bar {
    position: relative;
    width: 100%;
    height: 20vh;
    border-bottom: 1px solid black;
    background: rgba(0, 0, 0, .1);
    border-radius: var(--radius) var(--radius) 0 0;
    overflow: hidden;
  }
  
  .barBg {
    bottom: 0;
    position: absolute;
    width: 100%;
    background: rgba(255, 0, 0, .2);
  }

  .bars .label {
    margin-top: .5rem;
    padding: 0 .5rem;
    text-align: center;
  }
</style>
@endsection

@php
$aToD = range("A", "D");
@endphp

@section("main")
<main>
  <header>
    <a class="goBack noPrint" href="/questionnaires/{{ $questionnaire->id }}/edit">Go back</a>
    <p>Questionnaire - Responses</p>
    <h1>{{ $questionnaire->title }}</h1>
  </header>
  <button id="btnPrint" class="noPrint btnSuccess" onclick="window.print();">Print responses</button>
  <h2>Respondents ({{ $questionnaire->respondents->count() }})</h2>
  <p class="desc">
    Each question below has a graph showing the total number of respondents, who
    selected a particular choice. The total number is also coupled with a calculated
    response rate to enable for quick statistics. For example: <i>50% percent of
    respondents selected Choice A for Question 1</i>.
  </p>
  <div class="questions">
    @foreach($questionnaire->questions as $key=>$question)
      <div class="question">
        <h3>{{ $key + 1 }}. {{ $question->body }}</h3>
        <div class="choices">
          @foreach($question->choices as $key=>$choice)
          <div class="choice">
            <p><span class="bold">{{ $aToD[$key] }}.</span> {{ $choice->choice }}</p>
          </div>
          @endforeach
        </div>
        <div class="bars">
          @foreach($question->choices as $key=>$choice)
          <div class="barColumn">
            <div class="bar">
              <div class="barBg" style="height: {{ $choice->responseRate() }}%;">
              </div>
            </div>
            <div class="label">
              <p><span class="bold">{{ $aToD[$key] }}</span> ({{ $choice->responses->count() }} - {{ $choice->responseRate() }}%)</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</main>
@endsection
