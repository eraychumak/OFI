@extends("layouts.app")

@section("main")
<main>
  <header>
    <nav>
      <a class="goBack" href="/questionnaires/{{ $questionnaire->id }}/edit">Go back</a>
    </nav>
    <p class="tag">Questionnaire - Questions</p>
    <p>{{ $questionnaire->title }}</p>
    <h1>Create a question</h1>
  </header>
  <form action="/questionnaires/{{ $questionnaire->id }}/questions/create" method="post">
    @csrf
    <div class="fields">
      <div class="field">
        <label for="body">Question</label>
        <input type="text" name="body[body]" id="body" value="{{ old("body.body") }}"/>
        @error("body.body")
          <p class="important">{{ $message }}
        @enderror
      </div>
      <h2>Choices</h2>
      <div class="field">
        <label for="choiceOne">Choice 1</label>
        <input type="text" name="choices[][choice]" id="choiceOne" value="{{ old("choices.0.choice") }}"/>
        @error("choices.0.choice")
          <p class="important">{{ $message }}
        @enderror
      </div>
      <div class="field">
        <label for="choiceTwo">Choice 2</label>
        <input type="text" name="choices[][choice]" id="choiceTwo" value="{{ old("choices.1.choice") }}"/>
        @error("choices.1.choice")
          <p class="important">{{ $message }}
        @enderror
      </div>
      <div class="field">
        <label for="choiceThree">Choice 3</label>
        <input type="text" name="choices[][choice]" id="choiceThree" value="{{ old("choices.2.choice") }}"/>
        @error("choices.2.choice")
          <p class="important">{{ $message }}
        @enderror
      </div>
      <div class="field">
        <label for="choiceFour">Choice 4</label>
        <input type="text" name="choices[][choice]" id="choiceFour" value="{{ old("choices.3.choice") }}"/>
        @error("choices.3.choice")
          <p class="important">{{ $message }}
        @enderror
      </div>
    </div>
    <button class="btnSuccess" type="submit">Create new question</button>
  </form>
</main>
@endsection
