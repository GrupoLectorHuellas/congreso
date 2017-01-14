@extends("layouts.base")
@section('title')
    <title>Mi Perfil</title>
    @endsection()

@section('contenido')
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Mi Perfil</h1>
  <div class="row">
        <!-- left column -->
        <div class="col-md-5 col-sm-6 col-xs-12">
            
                <div class="text-center">
                    <img src="{{url('frontend/images/fotoo.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                    
                </div>
        </div>
    <!-- Mi Perfil -->
             <div class="col-md-5 col-sm-6 col-xs-12 personal-info">
        
       
                        <div class="panel panel-info">
                                <div class="panel-heading">
                                <h3 class="panel-title">Información Personal</h3>
                                </div>
                            <div class="panel-body">
                                        
                                
                                
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><b>Cédula:</b></td>
                                        <td>0706829116</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nacionalidad:</b></td>
                                        <td>Ecuatoriana</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombres:</b></td>
                                        <td>Fernando</td>
                                    </tr>
                                
                                       <td><b>Apellidos:</b></td>
                                        <td>Castillo</td>
                                    </tr>
                                        
                                        <td><b>Género:</b></td>
                                        <td>Masculino</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><a href="mailto:jfnando_cas_30_@hotmail.com">jfnando_cas_30_@hotmail.com</a></td>
                                    </tr>
                                        <td><b>Télefono:</b></td>
                                        <td>0991851033</td>
                                        
                                    </tr>

                                    </tr>
                                        <td><b>Dirección:</b></td>
                                        <td>Puerto Bolivar</td>
                                        
                                    </tr>
                                     </tr>
                                        <td><b>Facultad:</b></td>
                                        <td>Ingeniería Civil</td>
                                        
                                    </tr>

                                     </tr>
                                        <td><b>Carrera:</b></td>
                                        <td>Ingeniería de Sistemas</td>
                                        
                                    </tr>

                                     </tr>
                                        <td><b>Título:</b></td>
                                        <td>-------------------</td>
                                        
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                
                                <span class="pull-right">
                                        <a href="{{url ('MiPerfil/EditarPerfil')}}" class="btn btn-primary">Editar Mi Perfil</a>
                                </span>
                                
                            
                            </div>
                                
                            
                     </div>
        
            </div>

           
             <div class="col-md-2 col-sm-6 col-xs-12">
                  <!--No borrar este div, porque se daña el diseño


                   -->
            </div>

           
    
            
    </div>
    </div>
</div>
@endsection()