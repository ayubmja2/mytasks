@props(['task'])
<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $task->user->name }}</div>
    <div class="py-8">
        <a href="{{route('tasks.show',$task->id)}}"><h3 class="group-hover:text-orange-500 text-xl font-bold transition-colors duration-300">{{ $task->name }}</h3></a>
{{--        <p class="text-sm mt-4">{{ $task->user->name }}</p>--}}
        <form action="{{route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>

    <div class="flex justify-between items-center mt-auto">

    </div>
</x-panel>
