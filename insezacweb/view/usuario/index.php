<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Inicio</h1>
   <h2 class="">Usuarios</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Usuarios</a></li>
   </ol>
 </div>
</div>

<?php
if(isset($mensaje))
{
 ?>
 <div class="container clear_both padding_fix">
   <div class="row">
     <div class="col-md-12">
       <div class="alert alert-success fade in">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <center><strong><i class="fa fa-check"></i>&nbsp;<?php echo $mensaje ?></strong> </center>
       </div>

     </div>
   </div>
 </div>
 <?php
}
?>
<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
     <div class="block-web">
       <div class="header">
         <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-8">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Administracion de usuarios</b></h2>
            </div>
           <div class="col-sm-4">
             <div class="btn-group pull-right" style="margin-right: 10px;">
               <div class="btn-group"> <a class="btn btn-sm btn-success" href="?c=Usuario&a=Crud"> <i class="fa fa-plus"></i> Alta de usuario </a> </div>
             </div>
           </div>
         </div>
       </div>
       <div class="porlets-content">
         <div class="table-responsive">
           <table  class="display table table-bordered table-striped" id="dynamic-table">
             <thead>
               <tr>
                 <th>Usuario</th>
                 <th>Dirección</th>
                 <th>Tipo usuario</th>
                 <th>Editar</th>
                 <th>Borrar</th>
               </tr>
             </thead>
             <tbody>
              <?php foreach($this->model->Listar() as $r): ?>
               <tr class="gradeA">
                <td><?php echo $r->usuario; ?></td>
                <td><?php echo $r->direccion; ?></td>
                <td><?php 
                switch ($r->tipoUsuario) {
                  case 1:
                  echo "Administrador";
                  break;
                  case 2:
                  echo "Secretario";
                  break;
                  case 3:
                  echo "Regular";
                  break;
                }?></td>
                <td class="center">
                  <a href="index.php?c=Usuario&a=Crud&idUsuario=<?php echo $r->idUsuario; ?>" class="btn btn-primary" role="button"><i class="fa fa-edit"></i></a>
                </td>
                <td class="center">
                 <a onclick="eliminarUsuario(<?php echo $r->idUsuario;?>);" class="btn btn-danger" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
               </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
            <th>Usuario</th>
            <th>Dirección</th>
            <th>Tipo usuario</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </tfoot>
      </table>
    </div><!--/table-responsive-->
  </div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--container clear_both padding_fix-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Eliminar usuario</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar al usuario?</h4>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=Usuario&a=Eliminar" enctype="multipart/form-data" method="post">
            <input hidden type="text" name="idUsuario" id="txtIdUsuario">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<script>
  eliminarUsuario = function(idUsuario){
    $('#txtIdUsuario').val(idUsuario);  
  };
</script>
