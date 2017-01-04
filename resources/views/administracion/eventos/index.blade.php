@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Inicio
            <small>Listar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Inicio</li>
        </ol>
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Expositores Registrados</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                @if(count($expositores) >0)
                    <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table class="table table-hover" >
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Titulo</th>
                                    <th>Email</th>
                                    <th>Experiencia</th>
                                    <th>Foto</th>
                                    <th>Acción</th>
                                </tr>
                                @foreach($expositores as $expositor)
                                    <tr data-id="{{$expositor->id}}">
                                        <td class="sorting_1">{{$expositor->id}}</td>
                                        <td>{{$expositor->nombres." ".$expositor->apellidos}}</td>
                                        <td>{{$expositor->titulo}}</td>
                                        <td>{{$expositor->email}}</td>
                                        <td>{{$expositor->experiencia_laboral}}</td>
                                        <td>
                                            <img src="{{url('uploads/'.$expositor->path)}}" alt="" style="width:100px;"/>
                                        </td>
                                        <td>
                                            {!!link_to_route('expositores.edit', $title = 'Editar', $parameters = $expositor->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                            {{$expositores->links()}}
                        </div>
                    </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['expositores.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/dist/js/expositores/java-expositor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection