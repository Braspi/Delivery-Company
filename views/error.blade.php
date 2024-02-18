<h1 class="text-2xl text-red-600">{{ $message }}</h1>
@if(isset($stacktrace))
    {{$stacktrace}}
@endif