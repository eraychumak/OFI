@extends("layouts.app")

@section("styles")
<style>
  main header nav {
    display: flex;
    justify-content: space-between;
  }

  section {
    margin: 1rem 0 ;
  }
  
  h2, h3 {
    margin-bottom: .5rem;
  }

  .owner {
    display: inline-block;
    margin-top: .3rem;
  }

  .owner .line {
    margin-top: .2rem;
    height: .1rem;
    width: 100%;
    background: #ddd;
    border-radius: 50%;
  } 

  .desc {
    line-height: 1.5rem;
  }

  .questions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .question {
    padding: 1rem;
    border: solid .1rem var(--color-secondary);
    border-radius: var(--radius);
  }

  .choices {
    display: flex;
    flex-direction: column;
    gap: .5rem;
  }

  .radioField {
    display: flex;
    align-items: center;
    gap: .5rem;
  }

  .actions {
    margin: 1rem 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    text-align: center;
  }
</style>
@endsection

@section("main")
<main>
  <header>
    <nav>
      <a class="goBack" href="/">Go back</a>
      @auth
        @can("update-questionnaire", $questionnaire)
          <a href="/questionnaires/{{ $questionnaire->id }}/edit">View as admin</a>
        @endcan
      @endauth
    </nav>
    <p class="tag">Questionnaire</p>
    <h1>{{ $questionnaire->title }}</h1>
    <div class="owner">
      <p>
        Published by:
        @auth
          @if(auth()->user()->id === $questionnaire->user->id)
            <span class="bold">You</span>
          @else
            {{ $questionnaire->user->name }}
          @endif
        @else
          {{ $questionnaire->user->name }}
        @endauth
      </p>
      <div class="line"></div>
    </div>
  </header>
  <p class="desc">{{ $questionnaire->description }}</p>
  <section>
    <h2>Questions</h2>
    @if($questionnaire->questions->count() > 0)
      <form action="/questionnaires/{{ $questionnaire->id }}/submit" method="post">
        @csrf
        <div class="questions">
          @foreach($questionnaire->questions as $key=>$question)
            <div class="question">
              <h3>{{ $key + 1 }}. {{ $question->body}}</h3>
              <div class="choices">
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
                </div>
              @error("choices." . $key . ".choice_id")
                <p class="important">{{ $message }}</p>
              @enderror
            </div>
          @endforeach
        </div>
        <div class="actions">
          <button class="btnSuccess" id="btnSubmitResponses" type="submit">Submit responses</button>
          <a class="important" href="/">Withdraw Consent / Cancel</a>
        </div>
      </form>
    @else
      <p class="important">This questionnaire has no questions for you to respond to yet.</p>
    @endif
  </section>
</main>
@endsection
