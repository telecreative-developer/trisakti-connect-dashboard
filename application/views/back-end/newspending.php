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
        <nav class="light-blue darken-4">
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
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?php echo base_url();?>dashboard"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
            
            <li class="no-padding active">
                <a class="collapsible-header waves-effect waves-grey active"><i class="material-icons">import_contacts</i>News<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include"header/menu-news.php";?>
                    </ul>
                </div>
            </li>
            
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_circle</i>Users<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include"header/menu-faculty.php";?>    
                    </ul>
                </div>
            </li>

            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">insert_chart</i>Vote<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include"header/menu-polls.php";?>      
                    </ul>
                </div>
            </li>

            <div class="hidden" span style="display:none">
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">report</i>Report<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include"header/menu-report.php";?>      
                    </ul>
                </div>
            </li>
            </div>
        </ul>
        </div>
    </aside>
    <main class="mn-inner inner-active-sidebar">
      <div class="row">
            <div class="col s12">
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">News 
                        <br>
                        </span>
                                
                            <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Title</th>
                                    <th>Thumbnail</th>
                                    <th width="20%">Date</th>
                                    <th width="10%">Category</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php 
			    $no = 1;

                            foreach ($pending as $new) {
                              
                            ?>

                            <tbody>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $new->title;?></td>
                                <td>
                                
                                    <?php 
                                        $thumbnail = $new->thumbnail;
                                        if($thumbnail == ''){
                                        ?>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="img-responsive" width="100px"></a>
                                        <?php 
                                        }else{
                                        ?>
                                            <img src="<?php echo $new->thumbnail?>" alt="img" class="img-responsive" width="100px"></a>
                                        
                                        <?php 
                                            }
                                        ?>

                                </td>
                                <td><?php echo $new->date;?></td>
                                <td><?php echo $new->category;?></td>
                                <td><?php echo $new->name;?></td>
                                <td><button class="btn brown darken-1">Pending</button></td>
                                <td>

                                    <?php 
                                    $status = $new->status;
                                    
                                    if ($status == 'Pending') {   
                                    ?>
                                    <a onclick="javascript:return confirm('Agree ?')" href="<?php echo base_url() . "pendingnews/" . $new->id_news; ?>">
                                        <button class="waves-effect light-blue darken-4 btn"><i class="material-icons">check</i> </button> 
                                    </a>

                                    <?php
                                        }
                                    ?>

                                </td>     
                            </tr>

                        <?php
                          $no++; 
                          } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
