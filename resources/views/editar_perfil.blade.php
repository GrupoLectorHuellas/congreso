@extends("layouts.base")
@section('title')
    <title>Editar Mi Perfil</title>
    @endsection()

@section('contenido')
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Editar Perfil</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="{{url('frontend/images/fotoo.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Subir Otra Foto</h6>
        
        <span class="btn btn-default btn-file">
               Buscar Imágen <input type="file">
        </span>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        Por Favor Completar todos los campos con información Verídica
      </div>
      <h3>Información Personal</h3>

      <form class="form-horizontal" role="form">

        <div class="form-group">
          <label class="col-lg-3 control-label">Nacionalidad:</label>
          <div class="col-lg-8">
            <input name="nacionalidad" class="form-control" value="Extranjero" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Nombres:</label>
          <div class="col-lg-8">
            <input class="form-control" value="Fernando" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Apellidos:</label>
          <div class="col-lg-8">
            <input class="form-control" value="Castillo" type="text">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="jf@gmail.com" type="text">
          </div>
        </div>

        

        <div class="form-group">
          <label class="col-lg-3 control-label">Provincia:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select class="form-control">
                <option value="El Oro">El Oro</option>
                <option value="Guayaquil">Guayaquil</option>
           
              </select>
            </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Cantón:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select class="form-control">
                <option value="Machala">Machala</option>
                <option value="Santa Rosa">Santa Rosa</option>
           
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Genero:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select class="form-control">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
           
              </select>
            </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Facultad:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select class="form-control">
                <option value="Ingenieria Civil">Ingenieria Civil</option>
                <option value="Administracion">Administracion</option>
           
              </select>
            </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Carrera:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select class="form-control">
                <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                <option value="Medicina">Medicina</option>
           
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label">Titulo:</label>
          <div class="col-md-8">
            <input class="form-control" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label">Direccion:</label>
          <div class="col-md-8">
            <input class="form-control" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmar Contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Guardar Cambios" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancelar" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection()