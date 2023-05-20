@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show"
  class="fixed top-20 rounded-lg left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-48 py-3">
  <p>
    {{session('message')}}
  </p>
</div>
@endif
