<div class="box-body table-responsive no-padding" >
    <table class="table table-hover" >
        <tr>
            <th>ID</th>
            <th>Url</th>
            <th>Descipción</th>
            <th>Acción</th>
        </tr>
        @foreach($videos as $video)
            <tr data-id="{{$video->id}}">
                <td class="sorting_1">{{$video->id}}</td>
                <td>{{$video->url}}</td>
                <td>{{$video->descripcion}}</td>
                <td>
                    {!!link_to_route('videos.edit', $title = 'Editar', $parameters = $video->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                    

                </td>

            </tr>
        @endforeach
    </table>
    {{$videos->links()}}
</div>