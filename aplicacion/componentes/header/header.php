<!-- Buscamos los datos los usuarios registrados en el sistema -->
<?php              
 $sql_usuario = $db->query("select * from usuarios where id = ".$_SESSION['id']." ");
 $array_usuario = $sql_usuario->fetch_array();

 //busco la cantidad de mensajes no leidos
 $sql_numero = $db->query("SELECT * from mensaje m inner join usuarios u on m.de = u.id  where m.para = ".$_SESSION['id']." and m.leido = 'no' ");
 $numero = $sql_numero->num_rows;
 
 ?>
   <header class="main-header" style="position:fixed;">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size:10px"><b>EMAIL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>EMAIL</b></span>
    </a>
    <!-- NAVEGACION -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <div class="navbar-custom-menu">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

      <!-- Messages: style can be found in dropdown.less-->
           <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <!--Notificacion-->
              <span id="count" class="label label-success" style="font-size: 14px"></span>
            </a>

            <ul id="notify" class="dropdown-menu">
            <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo "../".$array_usuario['foto'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $array_usuario['nombre']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo "../".$array_usuario['foto'] ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $array_usuario['nombre']?> 
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="usuarios/perfil-usuario.php" class="btn btn-default btn-flat">Ver Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir/index.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      </ul>
      </div>
      </ul>
      </div>
    
    </nav>
  </header>
  
         