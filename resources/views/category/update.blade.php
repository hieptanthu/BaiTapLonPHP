<x-layout>
    
    <form style="max-width: 500px; margin: 0 auto;" action="{{route('Category.update', $category)}}" method="post">
        @csrf
        @method('PUT')
        <h1> Category: {{$category->name}}</h1>
        <div class="form-group has-success modal-body">
            <label class="control-label" for="inputSuccess">Input Name Category</label>
            <input style="max-width: 500;" type="text" class="form-control" id="name" name="name" value="{{$category->name}}"
                control-id="ControlID-26">
        </div>
        <p style="display: flex;justify-content: space-between; ">
            <a class="btn btn-default" href="/Category">Close</a>
            <button class="btn btn-primary" name="btn_add" control-id="ControlID-16">Add</button>
        </p>
    </form>
</x-layout>
