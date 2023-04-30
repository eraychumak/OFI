@extends("layouts.app")

@section("styles")
<style>
  .important {
    color: red;
  }
</style>
@endsection

@section("main")
<main>
  <header>
    <p>Questionnaire - Admin Mode</p>
    <h1>{{ $questionnaire->title }}</h1>
    <p>Description: <i>{{ $questionnaire->description }}</i></p>
  </header>
  @auth
    @if($questionnaire->user->id == auth()->user()->id)
      <a href="/questionnaires/{{ $questionnaire->id }}">View as respondent</a>
      <a href="/questionnaires/{{ $questionnaire->id }}/responses">View responses</a>
    @endif
  @endauth
  <h2>Update questionnaire details</h2>
  <form action="/questionnaires/{{ $questionnaire->id }}/update" method="post">
    @csrf
    @method("PUT")
    <div class="field">
      <label for="title">Title</label>
      <input name="title" id="title" value="{{ $questionnaire->title }}"/>
      @error("title")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <div class="field">
      <label for="description">Description</label>
      <textarea name="description" id="description">{{ $questionnaire->description }}</textarea>
      @error("description")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <button type="submit">Update questionnaire</button>
  </form>
  <h2>Questions</h2>
  @auth
    @if($questionnaire->user->id == auth()->user()->id)
      <a href="/questionnaires/{{ $questionnaire->id }}/questions/create">Create new question</a>
    @endif
  @endauth
  @foreach($questionnaire->questions as $question)
    <div class="question">
      <h3>
        @auth
          @if($questionnaire->user->id == auth()->user()->id)
            <a
              href="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}"
            >
              {{ $question->body }}
            </a>
          @else
            {{ $question->body}}
          @endif
        @endauth
      </h3>
      <fieldset>
        <legend>Select your answer:</legend>
        @foreach($question->choices as $choice)
          <div class="radioField">
            <input type="radio" name="{{$question->id}}-selectedChoice" id="{{ $choice->id }}" value="{{$choice->choice}}"/>
            <label for="{{ $choice->id }}">{{ $choice->choice }}</label>
          </div>
        @endforeach
      </fieldset>
    </div>
  @endforeach
</main>
@endsection
