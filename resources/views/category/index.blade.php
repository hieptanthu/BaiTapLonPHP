<x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div style="distplay" class="panel-heading">
                            <h1>category</h1>
                            <a style="margin-left: 80%;" class="btn btn-primary" href="/Category/create"> add</a>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>stt</th>
                                            <th>name</th>
                                            <th>update</th>
                                            <th>off</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr class="{{ $loop->index % 2 == 0 ? 'info' : '' }}">
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                               
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="{{route('Category.edit',$category)}}">update </a>
                                            </td>
                                            <td><form action="{{route('Category.offCategory',$category)}}" method="POST">
                                                @csrf 
                                                @method('put')
                                                @if ( $category->delete==0)
                                                <button class="btn btn-danger" >off</button>
                                                @else
                                                <button class="btn btn-primary" >on</button>
                                                @endif
                                            </form></td>
                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
    


{{-- <x-layout>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">


                        <div style="distplay" class="panel-heading">
                            <h1>category</h1>
                            <a style="margin-left: 80%;" class="btn btn-primary" href="?mod=category&act=create">
                                add</a>

                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>stt</th>
                                            <th>name</th>
                                            <th>update</th>
                                            <th>off</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> --}}
