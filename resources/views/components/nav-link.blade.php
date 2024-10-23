@props(["active"=>false])
<a class="{{$active?"bg-gray-900":""}}block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white" {{$attributes}}>{{ $slot }}</a>