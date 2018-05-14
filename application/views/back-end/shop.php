<?php 
    error_reporting(0);
?>
<style type="text/css">
    a.reply_reports{
        background: #01579b;
        color:#fff;
        border-radius: 5px;
        padding-left:10px;
        padding-top:10px;
        padding-bottom:10px;
    }
</style>
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
                <div class="sidebar-profile-image">
                    <img src="<?php echo base_url();?>assets/images/profile-image.png" class="circle" alt="">
                </div>
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
            <li class="no-padding active">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">report</i>Report<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-report.php";?>      
                    </ul>
                </div>
            </li>  
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">add_shopping_cart</i>E-commerce<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php include "header/menu-ecommerce.php";?>      
                    </ul>
                </div>
            </li>               
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
                        <span class="card-title"> 
                        
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th width="10%">Cover</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th width="5%">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($shop as $rep) {
                                    $now = $rep->createdAt;
                                ?>
                                <tr>
                                    <td><center><?php echo $no;?></center></td>
                                    <td><img src="<?php echo $rep->cover;?>" width="100%;"/></td>
                                    <td><p span style="font-weight:normal;"><?php echo $rep->name;?></p></td>
                                    <td><p span style="font-weight:normal;"><b>Rp <?php echo $rep->price;?></b></p></td>
                                    <td>
                                      <?php 
                                        if($rep->shopcategory_id == "1"){
                                          echo "Fashion Pria";
                                        }else if($rep->shopcategory_id == "2"){
                                          echo "Fashion Wanita";
                                        }else if($rep->shopcategory_id == "3"){
                                          echo "Aksesoris";
                                        }else if($rep->shopcategory_id == "4"){
                                          echo "Elektronik";
                                        }else if($rep->shopcategory_id == "5"){
                                          echo "Furniture";
                                        }else if($rep->shopcategory_id == "6"){
                                          echo "Makanan";
                                        }else{

                                        }
                                      ?>
                                    </td>
                                    <td><p span style="font-weight:normal;"><b><?php echo $rep->description;?></b></p></td>
                                    <td>
                                      <?php 
                                        if($rep->status == '0'){
                                        ?> <p style="color:red">Belum dikonfirmasi</p>
                                        <?php
                                        }else{
                                        ?> <p style="color:green">Sudah dikonfirmasi</p>
                                        <?php
                                        }
                                      ?>
                                    </td>
                                    <td>
                                        <a onclick="javascript:return confirm('Yakin untuk mengkonfirmasi barang ini ?')" href="<?php echo base_url()?>approve_item/<?php echo $rep->shop_id;?>">
                                            <i class="material-icons left">check</i>
                                        </a>
                                    </td>
                                </tr>
                                
                                <?php
                                  $no++; 
                                  }
                                ?>
                                
                                          
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
