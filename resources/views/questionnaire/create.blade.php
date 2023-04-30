@extends("layouts.app")

@section("main")
<main>
  <h1>Create a questionnaire</h1>
  <form action="/questionnaires/create" method="post">
    @csrf
    <div class="field">
      <label for="title">Title</label>
      <input name="title" id="title"/>
      @error("title")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <div class="field">
      <label for="description">Description</label>
      <textarea name="description" id="description"></textarea>
      @error("description")
        <p class="important">{{ $message }}
      @enderror
    </div>
    <button id="createQuestionnaireBtn" type="submit">Create new questionnaire</button>
  </form>
</main>
@endsection
