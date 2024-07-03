@php
    $classes = 'p-4 bg-white/5 rounded-xl  mb-8 border border-transparent hover:border-orange-400 group transition-colors duration-300';
@endphp
<div {{$attributes(['class'=> $classes])}}>
    {{$slot}}
</div>
