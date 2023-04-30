@extends("layouts.app")

@section("main")
<main>
  <header>
    <nav>
      <a class="goBack" href="/questionnaires/{{ $questionnaire->id }}/edit">Go back</a>
    </nav>
    <p class="tag">Questionnaire - Questions</p>
    <p>{{ $questionnaire->title }}</p>
    <h1>Update question</h1>
  </header>
  <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
    @csrf
    @method("PUT")
    <div class="fields">
      <div class="field">
        <label for="body">Question</label>
        <input type="text" name="body[body]" id="body" value="{{ $question->body }}"/>
        @error("body.body")
          <p class="important">{{ $message }}
        @enderror
      </div>
    </div>
    <section>
      <h2>Choices</h2>
      <div class="fields">
        <div class="field">
          <label for="choiceOne">Choice 1</label>
          <input type="text" name="choices[][choice]" id="choiceOne" value="{{ $question->choices[0]->choice }}"/>
          @error("choices.0.choice")
            <p class="important">{{ $message }}
          @enderror
        </div>
        <div class="field">
          <label for="choiceTwo">Choice 2</label>
          <input type="text" name="choices[][choice]" id="choiceTwo" value="{{ $question->choices[1]->choice }}"/>
          @error("choices.1.choice")
            <p class="important">{{ $message }}
          @enderror
        </div>
        <div class="field">
          <label for="choiceThree">Choice 3</label>
          <input type="text" name="choices[][choice]" id="choiceThree" value="{{ $question->choices[2]->choice }}"/>
          @error("choices.2.choice")
            <p class="important">{{ $message }}
          @enderror
        </div>
        <div class="field">
          <label for="choiceFour">Choice 4</label>
          <input type="text" name="choices[][choice]" id="choiceFour" value="{{ $question->choices[3]->choice }}"/>
          @error("choices.3.choice")
            <p class="important">{{ $message }}
          @enderror
        </div>
      </div>
    </section>
    <button class="btnSuccess" type="submit">Save question</button>
  </form>
  <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
    @csrf
    @method("DELETE")
    <button class="btnDelete" type="submit">Delete question</button>
  </form>
</main>
@endsection
