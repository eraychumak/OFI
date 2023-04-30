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
          <a href="/questionnaires/{{ $questionnaire->id }}/responses">View responses ({{ $questionnaire->respondents->count() }})</a>
          <a href="/questionnaires/{{ $questionnaire->id }}">View as respondent</a>
        @endcan
      @endauth
    </nav>
    <p class="tag">Questionnaire - Admin Mode</p>
    <h1>{{ $questionnaire->title }}</h1>
  </header>
  <section>
    <header>
      <h2>Update questionnaire</h2>
    </header>
    <form action="/questionnaires/{{ $questionnaire->id }}/update" method="post">
      @csrf
      @method("PUT")
      <div class="fields">
        <div class="field">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" value="{{ $questionnaire->title }}"/>
          @error("title")
            <p class="important">{{ $message }}
          @enderror
        </div>
        <div class="field">
          <label for="description">Description</label>
          <textarea name="description" id="description" rows="10">{{ $questionnaire->description }}</textarea>
          @error("description")
            <p class="important">{{ $message }}
          @enderror
        </div>
      </div>
      <button class="btnSuccess" id="btnUpdateQuestionnaire" type="submit">Save questionnaire</button>
    </form>
  </section>
  <section>
    <header>
      <h2>Questions</h2>
      @auth
        @if($questionnaire->user->id == auth()->user()->id)
          <a href="/questionnaires/{{ $questionnaire->id }}/questions/create">Create new question</a>
        @endif
      @endauth
    </header>
    <div class="questions">
      @foreach($questionnaire->questions as $key=>$question)
        <div class="question">
          <h3>
            @auth
              @if($questionnaire->user->id == auth()->user()->id)
                <a
                  href="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}"
                >
                  {{ $key + 1}}. {{ $question->body }}
                </a>
              @else
                {{ $key + 1}}. {{ $question->body}}
              @endif
            @endauth
          </h3>
          <div class="choices">
            @foreach($question->choices as $choice)
              <div class="radioField">
                <input type="radio" name="{{$question->id}}-selectedChoice" id="{{ $choice->id }}" value="{{$choice->choice}}"/>
                <label for="{{ $choice->id }}">{{ $choice->choice }}</label>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  <section>
  <section>
    <form action="/questionnaires/{{ $questionnaire->id }}" method="POST">
      @csrf
      @method("DELETE")
      <button class="btnDelete" type="submit">Delete questionnaire</button>
    </form>
  </section>
</main>
@endsection
