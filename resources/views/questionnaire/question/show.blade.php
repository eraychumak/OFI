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
    <p>Questionnaire</p>
    <a href="/questionnaires/{{ $questionnaire->id }}">{{ $questionnaire->title }}</a>
    <h1>Update question</h1>
  </header>
  <a href="/questionnaires/{{ $questionnaire->id }}/edit">Go back</a>
  <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
    @csrf
    @method("PUT")
    <div class="field">
      <label for="body">Question</label>
      <input name="body[body]" id="body" value="{{ $question->body }}"/>
      @error("body.body")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <h2>Choices</h2>
    <div class="field">
      <label for="choiceOne">Choice 1</label>
      <input name="choices[][choice]" id="choiceOne" value="{{ $question->choices[0]->choice }}"/>
      @error("choices.0.choice")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <div class="field">
      <label for="choiceTwo">Choice 2</label>
      <input name="choices[][choice]" id="choiceTwo" value="{{ $question->choices[1]->choice }}"/>
      @error("choices.1.choice")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <div class="field">
      <label for="choiceThree">Choice 3</label>
      <input name="choices[][choice]" id="choiceThree" value="{{ $question->choices[2]->choice }}"/>
      @error("choices.2.choice")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <div class="field">
      <label for="choiceFour">Choice 4</label>
      <input name="choices[][choice]" id="choiceFour" value="{{ $question->choices[3]->choice }}"/>
      @error("choices.3.choice")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <button type="submit">Update question</button>
  </form>
  <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete</button>
  </form>
</main>
@endsection
