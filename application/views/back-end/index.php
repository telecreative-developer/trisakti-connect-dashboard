<div class="loader-bg"></div>
<div class="loader">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-teal lighten-1">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">
        <nav class="light-blue darken-3">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <div class="header-title col s3 m3">      
                    <span class="chapter-title">Dashboard</span>
                </div>

            </div>
        </nav>
    </header>
   

    <aside id="slide-out" class="side-nav white fixed">
        <div class="side-nav-wrapper">
            <div class="sidebar-profile">
                <div class="sidebar-profile-info">
                    <a href="javascript:void(0);" class="account-settings-link">
                        <?php 
                        $username = $this->session->userdata('username'); 
                        ?>
                        <p><?php echo ucfirst($username); ?></p>
                        <?php 
                        echo "Trisakti Connect";
                        ?>
                        <span><i class="material-icons right">arrow_drop_down</i></span>
                    </a>
                </div>
            </div>
            <div class="sidebar-account-settings">
                <ul>
                    <li class="divider"></li>
                    <li class="no-padding">
                        <a href="logout" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                    </li>
                </ul>
            </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding active"><a class="waves-effect waves-grey active" href="<?php echo base_url();?>dashboard"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
            
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">import_contacts</i>News<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-news.php";?>
                    </ul>
                </div>
            </li>
            
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_circle</i>Users<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-faculty.php";?>    
                    </ul>
                </div>
            </li>

            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">insert_chart</i>Vote<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-polls.php";?>      
                    </ul>
                </div>
            </li>

            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">report</i>Report<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-report.php";?>      
                    </ul>
                </div>
            </li>           
           
        </ul>
        <!--<div class="footer">
            <br>
            <a href="#!">Telecreative </a>
        </div>
        !-->
        </div>
    </aside>
    <main class="mn-inner inner-active-sidebar">
        <div class="middle-content">
            <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l4">
                <div class="card stats-card">
                    <div class="card-content">
                        <div class="card-options">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                            </ul>
                        </div>
                        <span class="card-title">Categories</span>
                        <?php 
                            $query = $this->db->query('SELECT * FROM categories');
                        ?>
                        <span class="stats-counter"><span class="counter"><?php echo $query->num_rows();?></span><small></small></span>
                    </div>
                    <div class="progress stats-card-progress">
                        <div class="determinate" style="width: 70%"></div>
                    </div>
                </div>
            </div>
                <div class="col s12 m12 l4">
                <div class="card stats-card">
                    <div class="card-content">
                        <div class="card-options">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="material-icons">import_contacts</i></a></li>
                            </ul>
                        </div>
                        <span class="card-title"> Pending News </span>
                        <?php 
                            $query = $this->db->query("SELECT * FROM news WHERE status ='Pending' ");
                        ?>
                       <span class="stats-counter"><span class="counter"><?php echo $query->num_rows();?></span><small></small></span>
                    </div>

                    <div class="progress stats-card-progress">
                        <div class="determinate" style="width: 70%"></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card stats-card">
                    <div class="card-content">
                        <div class="card-options">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="material-icons">account_circle</i></a></li>
                            </ul>
                        </div>

                        <span class="card-title">Users</span>
                        <?php 
                            $query = $this->db->query('SELECT * FROM users');
                        ?>
                        <span class="stats-counter"><span class="counter"><?php echo $query->num_rows();?></span><small></small></span>
                    </div>
                    <div class="progress stats-card-progress">
                        <div class="determinate" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        <div class="inner-sidebar">
            <span class="inner-sidebar-title">Pending News</span>
       
            <?php foreach($news as $pending){?>
            <div class="message-list">
            <div class="info-item message-item" span style="margin-top:10px;">
                    <?php 
                        if($pending->avatar == ""){
                            echo"<img class='circle' src='https://vignette.wikia.nocookie.net/mafiagame/images/2/23/Unknown_Person.png/revision/latest/scale-to-width-down/350?cb=20151119092211'/>";
                        }else{
                        ?>
                            <img class='circle' src="<?php echo base_url();?>images/<?php echo $pending->avatar;?>"/> 
                        
                        <?php 

                        }
                    ?>
                    <div class="message-info">
                        <div class="message-author">
                            <?php echo substr($pending->title,0,15);?>
                        </div>
                        <small><?php echo substr($pending->name,0,15);?></small>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>



    </main>
    <div class="page-footer">
        <div class="footer-grid container">
            <div class="footer-l white">&nbsp;</div>
            <div class="footer-grid-l white">
            </div>
            <div class="footer-r white">&nbsp;</div>
            <div class="footer-grid-r white">
                <a class="footer-text" span style="color:#03569b" href="http://www.telecreativenow.com/">
                    <span class="direction">Powered by</span>
                    <div>
                        Telecreative
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="left-sidebar-hover"></div>
