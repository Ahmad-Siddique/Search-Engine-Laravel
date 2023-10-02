@if(session("user"))
    <footer class="bg-{{session("user")->color}} mt-5">
@else
    <footer class="bg-dark mt-5">
@endif



    <div style="color:white" class="text-center pt-5 pb-5">
        All rights reserved @ 2023
    </div>
  </footer>