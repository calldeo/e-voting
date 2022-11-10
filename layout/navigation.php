<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="../dashboard/" class="logo">
        E-VOTE
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<?php
					if($dataUser['akses']==1){
				?>
                <img alt="" src="../../assets/images/guru1.png">
				<?php
					} else{
				?>
                <img alt="" src="../../assets/images/siswa1.png">
				<?php	
					}
				?>
                <span class="username"><?php echo ucwords($dataUser['nama'])?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="s" type="button" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-key"></i> Log Out</a href="s"></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>

</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a
                    <?php
                        if ($page=='dashboard') {
                    ?>
                        class="active"
                    <?php
                        } else {
                        }
                    ?>
                        href="../dashboard/">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a
                    <?php
                        if ($page=='petunjuk') {
                    ?>
                        class="active"
                    <?php
                        } else {
                        }
                    ?>
                        href="../petunjuk/">
                        <i class="fa fa-book"></i>
                        <span>Petunjuk Penggunaan</span>
                    </a>
                </li>
				
				<?php
				$stmt = $admin->runQuery("SELECT * FROM setting_waktu WHERE id_setting=1");  
                $stmt->execute();
              
                if($stmt->rowCount()>0)
                {
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  {
					  if($row['waktu']==date('Y-m-d')){
				?>
                <li>
                    <a
                    <?php
                        if ($page=='vote') {
                    ?>
                        class="active"
                    <?php
                        } else {
                        }
                    ?>
                        href="../vote/">
                        <i class="fa fa-bullhorn"></i>
                        <span>Vote</span>
                    </a>
                </li>
				<?php
					  }
				  }
				}
				?>
				
				<?php if($dataUser['akses'] == 1){?>
                <li class="sub-menu">
                    <a
                    <?php
                        if ($page=='polling') {
                    ?>
                        class="active"
                    <?php
                        } else {
                        }
                    ?>
                        href="../polling/">
                        <i class="fa fa-tasks"></i>
                        <span>Data Polling</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <?php
                        if ($page=='Admin' || $page=='user' || $page=='calon' || $page=='voted') {
                    ?>
                            <a href="javascript:;" class="active">
                    <?php
                        } else
                        {
                    ?>
                            <a href="javascript:;">
                    <?php
                        }
                    ?>
                        <i class="fa fa-gear"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a
                            <?php
                                if ($page=='Admin') {
                            ?>
                                class="active"
                            <?php
                                } else {
                                }
                            ?>
                                href="../Admin/">
                                <i class="fa fa-book"></i>
                                <span>Data Administrator</span>
                            </a>
                        </li>
                        <li>
                            <a
                            <?php
                                if ($page=='user') {
                            ?>
                                class="active"
                            <?php
                                } else {
                                }
                            ?>
                                href="../user/">
                                <i class="fa fa-book"></i>
                                <span>Data User</span>
                            </a>
                        </li>
                        <li>
                            <a
                            <?php
                                if ($page=='calon') {
                            ?>
                                class="active"
                            <?php
                                } else {
                                }
                            ?>
                                href="../calon/">
                                <i class="fa fa-tasks"></i>
                                <span>Data Calon Ketua OSIS</span>
                            </a>
                        </li>
                        <li>
                            <a
                            <?php
                                if ($page=='voted') {
                            ?>
                                class="active"
                            <?php
                                } else {
                                }
                            ?>
                                href="../voted/">
                                <i class="fa fa-tasks"></i>
                                <span>Data Voted</span>
                            </a>
                        </li>
						<li>
                            <a
                            <?php
                                if ($page=='tanggal vote') {
                            ?>
                                class="active"
                            <?php
                                } else {
                                }
                            ?>
                                href="../tglVote/">
                                <i class="fa fa-calendar"></i>
                                <span>Tanggal Vote</span>
                            </a>
                        </li>
                      <?php }?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
