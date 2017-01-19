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
                    <h3 class="box-title">Firmas Registradas</h3>

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
                @if(count($firmas) >0)
                    <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table class="table table-hover" >
                                <tr>
                                    <th>ID</th>
                                    <th>Abreviatura</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Foto</th>
                                    <th>Acción</th>
                                </tr>
                                @foreach($firmas as $firma)
                                    <tr data-id="{{$firma->id}}">
                                        <td class="sorting_1">{{$firma->id}}</td>
                                        <td>{{$firma->abreviatura}}</td>
                                        <td>{{$firma->nombre}}</td>
                                        <td>{{$firma->apellidos}}</td>
                                        <td>{{$firma->estado}}</td>
                                        
                                        <td>
                                            <img src="{{url('uploads/'.$firma->path)}}" alt="" style="width:100px;"/>
                                        </td>
                                        <td>
                                            {!!link_to_route('firmas.edit', $title = 'Editar', $parameters = $firma->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                            {{$firmas->links()}}
                        </div>
                    </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna firma...</label>  </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['firmas.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/dist/js/firmas/java-firmas.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection