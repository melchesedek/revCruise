@extends('cruiseOptions')

@section('content')
<li class="cruise-section no-gutter">
  <article>
      <img src="https://i.imgur.com/xCLiMOj.jpg" alt="First Cruis">
      <div class="pricing"><p>Starting at</p>$198</div>
  </article>
    <footer>
        <p>Cruise Line Name - Cruise Ship Name</p>
        <h3>Cruise Sailing Title</h3>
        <div class="radio">
            <label>
                <input type="radio" name=sailingDate id="sailingOption1" value="option1">
                <div class="title">Sailing Date 1</div><div class="price">$300</div>
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="sailingDate" id="sailingOption2" value="option2">
                <div class="title">Sailing Date 2</div><div class="price">$300</div>
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="sailingDate" id="sailingOption3" value="option3">
                <div class="title">Sailing Date 3</div><div class="price">$300</div>
            </label>
        </div>
    </footer>
</li>


@stop
@section('scripts.footer')
@stop


