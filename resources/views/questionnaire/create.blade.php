@extends("layouts.app")

@section("main")
<main>
  <header>
    <a class="goBack" href="/">Go back</a>
    <h1>Create a questionnaire</h1>
  </header>
  <form action="/questionnaires/create" method="post">
    @csrf
    <div class="fields">
      <div class="field">
        <label for="title">Title</label>
        <input type="text" name="title" id="title"/>
        @error("title")
          <p class="important">{{ $message }}
        @enderror
      </div>
      <div class="field">
        <label for="description">Description</label>
        <textarea name="description" id="description" min="10"></textarea>
        @error("description")
          <p class="important">{{ $message }}
        @enderror
      </div>
    </div>
    <button id="createQuestionnaireBtn" type="submit">Create new questionnaire</button>
  </form>
</main>
@endsection
