@extends("layouts.home_user")
@section('title')
    <h1 class="page-header">Editar Perfil</h1>
    @endsection()

@section('contenido')
<div class="container" style="padding-top: 60px;">
  
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
      

      <form class="form-horizontal" role="form">

      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        Por Favor Completar todos los campos con información Verídica
      </div>
      <h3>Información Personal</h3>

        <div class="form-group">
          <label class="col-lg-3 control-label">Nombres:</label>
          <div class="col-lg-8">
            <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user">
                      </i>
                    </div>
              <input name="nombres" class="form-control" value="Fernando" type="text">
              </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Apellidos:</label>
          <div class="col-lg-8">
            <div class="input-group">
                  <div class="input-group-addon">
                        <i class="fa fa-user">
                        </i>
                    </div>
              <input name="apellidos" class="form-control" value="Castillo" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Teléfono:</label>
          <div class="col-lg-8">
            <div class="input-group">
                  <div class="input-group-addon">
                        <i class="fa fa-phone">
                        </i>
                    </div>
              <input name="telefono" class="form-control" value="0991851033" type="text">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <div class="input-group">
                  <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
            <input name="email" class="form-control" value="jf@gmail.com" type="text">
            <span class="input-group-addon" id="basic-addon2">@example.com</span>
            </div>
          </div>
        </div>

        

        <div class="form-group">
          <label class="col-lg-3 control-label">Provincia:</label>
          <div class="col-lg-8">
            <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-map-marker">
                        </i>
                    </div>
                <div class="ui-select">
                      <select class="form-control">
                        <option value="El Oro">El Oro</option>
                        <option value="Guayaquil">Guayaquil</option>
                  
                      </select>
                </div>
            </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Cantón:</label>
          <div class="col-lg-8">
             <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-map-marker">
                        </i>
                    </div>
                <div class="ui-select">
                  <select class="form-control">
                    <option value="Machala">Machala</option>
                    <option value="Santa Rosa">Santa Rosa</option>
              
                  </select>
                </div>
              </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-3 control-label">Direccion:</label>
          <div class="col-md-8">
            <div class="input-group">
                  <div class="input-group-addon">
                        <i class="fa fa-home">
                        </i>
                    </div>
            <input name="direccion" class="form-control" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Genero:</label>
          <div class="col-lg-8">
            <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-users">
                        </i>
                    </div>
                  <div class="ui-select">
                    <select class="form-control">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                
                    </select>
                  </div>
              </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Facultad:</label>
          <div class="col-lg-8">
            <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-university">
                        </i>
                    </div>
                <div class="ui-select">
                  <select class="form-control">
                    <option value="Ingenieria Civil">Ingenieria Civil</option>
                    <option value="Administracion">Administracion</option>
              
                  </select>
                </div>
              </div>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-3 control-label">Carrera:</label>
          <div class="col-lg-8">
            <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-graduation-cap">
                        </i>
                    </div>
                <div class="ui-select">
                  <select class="form-control">
                    <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                    <option value="Medicina">Medicina</option>
              
                  </select>
                </div>
              </div>
          </div>
        </div>

       


        <div class="form-group">
          <label class="col-md-3 control-label">Contraseña:</label>
          <div class="col-md-8">
            <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                <input name="password" class="form-control" value="11111122333" type="password">
              </div>
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-3 control-label">Confirmar Contraseña:</label>
          <div class="col-md-8">
             <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                <input class="form-control" value="11111122333" type="password">
              </div>
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