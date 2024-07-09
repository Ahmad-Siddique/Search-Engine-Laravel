@if(session("user"))
    <footer class="bg-{{session("user")->color}} mt-5">
@else
    <footer class="bg-dark mt-5">
@endif

<div class="row">
<div style="color:white" class="col-4 text-center pt-5 pb-5">
@if ($privacyPolicy)
<h2 class="text-white">Privacy Policy</h2>
    {!! $privacyPolicy->content !!}
@endif
    </div>

    <div style="color:white" class="col-4 text-center pt-5 pb-5">
        All rights reserved @ 2024
    </div>

    <div style="color:white" class="col-4 text-center pt-5 pb-5">
@if ($disclaimer)
<h2 class="text-white">Disclaimer</h2>
    {!! $disclaimer->content !!}
@endif
    </div>
</div>

    
  </footer>