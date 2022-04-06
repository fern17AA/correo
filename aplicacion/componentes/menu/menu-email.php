
<aside class="main-sidebar" id="scroball" style="position: fixed;">
   
    <section class="sidebar">
     
      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo "../".$array_usuario['foto'] ?>" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $array_usuario['nombre']?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>
     
      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Buscar">

          <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                
                </button>
              
              </span>
        
        </div>

      </form>

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MENÚ DE NAVEGACION</li>
        
       <li class="active">

          <a href="">

            <i class="fa fa-envelope"></i> <span>Email</span>

            <span class="label label-primary pull-right"><?php echo $numero ?></span>

            <span class="pull-right-container">

            </span>

          </a>

        </li>   

      </ul>

    </section>

  </aside>
