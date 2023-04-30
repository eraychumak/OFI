@extends("layouts.app")

@section("styles")
<style>
  .questionnaires {
    display: flex;
    flex-direction: column;
    gap: 1vh;
  }

  .questionnaire {
    text-align: center;
  }

  .titleContainer {
    text-align: left;
    padding: .5rem;
    border: solid .1rem var(--color-accent);
    border-radius: var(--radius);
    color: #000;
    transition: background 100ms ease-in-out;
  }

  .titleContainer:hover {
    background: var(--color-accent-lighter);
  }

  .questionnaire .owner {
    display: inline-block;
    padding: .2rem .5rem;
    border-radius: 0 0 var(--radius) var(--radius);
    background: var(--color-accent);
    color: var(--color-plain);
    font-family: "Roboto Condensed";
    font-weight: 500;
    font-size: .8rem;
    pointer-events: none;
  }
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
  <div class="questionnaires">
    @foreach($questionnaires as $questionnaire)
      <div class="questionnaire">
        <a class="titleContainer" href="/questionnaires/{{ $questionnaire->id }}">
          <p>{{ $questionnaire->title}}</p>
        </a>
        @auth
          @can("update-questionnaire", $questionnaire)
            <p class="owner">You own this one</p>
          @endif
        @endauth
      </div>
    @endforeach
  </div>
</main>
@endsection
