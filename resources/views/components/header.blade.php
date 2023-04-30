@if (session("err-msg"))
  <div class="alertBox">
    <p class="important">{{ session("err-msg") }}</p>
  </div>
@endif

<header class="top-level">
  <a href="/">Online Feedback<br/>Insight</a>
</header>