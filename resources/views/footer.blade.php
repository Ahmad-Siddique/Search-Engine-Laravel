@if(session("user"))
    <footer class="bg-{{session("user")->color}} mt-5">
@else
    <footer class="bg-dark mt-5">
@endif

<div class=" container-fluid row pt-2 pb-2">
<div style="color:white" class="col-12 col-lg-4 my-2">

   
        <a style="text-decoration: none; color:white" href="/privacy-policy">Privacy Policy</a>
        <br>
        <a style="text-decoration: none; color:white" href="/disclaimer">Disclaimer</a>
   

    </div>

    <div style="color:white" class="col-12 col-lg-4 text-center my-3">
        All rights reserved @ 2024
    </div>

    <div style="color:white" class="col-4 text-center ">

    </div>
</div>

    
  </footer>