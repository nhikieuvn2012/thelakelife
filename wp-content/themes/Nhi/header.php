<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title><?php wp_title();?></title>

    <?php

        wp_head();

    ?>

    <!-- Bootstrap -->

    <link href="<?php echo get_stylesheet_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet"/>

    <link href="<?php echo get_stylesheet_directory_uri();?>/style.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>

    <div class="container-fluid">

        <div class="row area-top">

            <div class="col-md-1">&nbsp;</div>

            <div class="col-md-4"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" /></div>

            <div class="col-md-6 text-right">

                <div class="dev">Developed By Lakehomes Pte Ltd</div>

                <div class="phone">Hotline:+65 6100 1195</div>

                <div class="txt">

                Showflat Ready by 6th Nov 2014<br />

                <b>E-Apps</b>:4th - 12th Oct 2014 | 

                <b>Booking</b>:7th and 8th Nov 2014 |

                <b>Developer Sales Team Enquiry</b>: 6871 4171<br/>

                </div>



                <a href="#" class="reg">Register for Public Booking Here! <img src="<?php echo get_stylesheet_directory_uri();?>/images/right.png" /></a>

                

            </div>

            <div class="col-md-1">&nbsp;</div>

        </div>

     <!---menu Mobile---!>
        <div class="row visible-xs">
            <div class="col-md-12">
        <select id="menumobile" class="combobox input-large form-control">
                    <?php
                    $menu_name = 'menu-header';
                    $count=0;
                    if(($locations=get_nav_menu_locations())&&isset( $locations[ $menu_name ] ) ) {
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                                        
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        
                                     
                        $menu_list = '';
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            if($menu_item->menu_item_parent==0&&$count>0){
                               
                                $count=0;
                                foreach ( (array) $menu_items as $key => $menu_item_p ) {
                                    if($menu_item_p->menu_item_parent==$menu_item->ID){
                                      $count=1;
                                    }
                                }
                                
                                $menu_list .= '<option value="'.$menu_item->url.'">'.$menu_item->title.'</option>';
                                    if($count==1){
                                                foreach ( (array) $menu_items as $key => $menu_item_p ) {
                                                    if($menu_item_p->menu_item_parent==$menu_item->ID){
                                                        
                                                        $count2=0;
                                                        foreach ( (array) $menu_items as $key => $menu_item_p2){
                                                        if($menu_item_p2->menu_item_parent==$menu_item_p->ID){
                                                            $count2=1;
                                                        }
                                                        }
                                                        
                                                       $menu_list.= '<option value="' .$menu_item_p->url. '">-'.$menu_item_p->title.'</option>';
                                                        if($count2==1){
                                                            foreach ( (array) $menu_items as $key => $menu_item_p2){
                                                                if($menu_item_p2->menu_item_parent==$menu_item_p->ID){
                                                                    $menu_list .= '<option value="'.$menu_item_p2->url.'">--'.$menu_item_p2->title.'</option>';  
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                    }
                            }
                            $count++;
                        }

                    
                     }
                     echo $menu_list;
                    ?>
        </select>
        
        <script type="text/javascript">
          $(document).ready(function(){
            $('#menumobile').change(function() {
                var txt=$('#menumobile').val();
                    window.location.replace(txt);
            });
          });
        </script>
        </div>
        </div>  

        <div class="row">

            <div class="col-md-12">

            <?php layerslider(2); ?>

            </div>

        </div>



        <div class="row area-menu hidden-xs">

                <div class="col-md-1">

                &nbsp;

                </div>

                

                <div class="col-md-10">

                <nav class="navbar navbar-default" role="navigation">

                      <div class="container-fluid">

                        <?php

                        $curUrl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                        $menu_name = 'menu-header';

                        if(($locations=get_nav_menu_locations())&&isset( $locations[ $menu_name ] ) ) {

                            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

                                            

                            $menu_items = wp_get_nav_menu_items($menu->term_id);

                            

                                         

                            $menu_list = '<ul class="nav navbar-nav navleft">';

                            foreach ( (array) $menu_items as $key => $menu_item ) {

                                if($menu_item->menu_item_parent==0){

                                   

                                    $count=0;

                                    foreach ( (array) $menu_items as $key => $menu_item_p ) {

                                        if($menu_item_p->menu_item_parent==$menu_item->ID){

                                          $count=1;

                                        }

                                    }

                                    if($curUrl==$menu_item->url){

                                        $menu_list .= '<li class="dropdown activer '.$menu_item->classes[0].'"><a data-toggle="dropdown" class="btn" data-target="#"  title="'.$menu_item->title.'" href="'.$menu_item->url.'">'.$menu_item->title.'</a>';

                                    }else{

                                        $menu_list .= '<li class="dropdown '.$menu_item->classes[0].'"><a data-toggle="dropdown" class="btn" data-target="#"  title="'.$menu_item->title.'" href="'.$menu_item->url.'">'.$menu_item->title.'</a>';

                                    }

                                        if($count==1){

                                            $menu_list.='<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';

                                                    foreach ( (array) $menu_items as $key => $menu_item_p ) {

                                                        if($menu_item_p->menu_item_parent==$menu_item->ID){

                                                            

                                                            $count2=0;

                                                            foreach ( (array) $menu_items as $key => $menu_item_p2){

                                                            if($menu_item_p2->menu_item_parent==$menu_item_p->ID){

                                                                $count2=1;

                                                            }

                                                            }

                                                            

                                                           $menu_list.= '<li class="dropdown-submenu"><a tabindex="-1" href="' .$menu_item_p->url. '">'.$menu_item_p->title.'</a>';

                                                           

                                                            if($count2==1){

                                                                $menu_list.='<ul class="dropdown-menu">';

                                                                foreach ( (array) $menu_items as $key => $menu_item_p2){

                                                                    if($menu_item_p2->menu_item_parent==$menu_item_p->ID){

                                                                        $menu_list .= '<li ><a tabindex="-1" href="'.$menu_item_p2->url.'">'.$menu_item_p2->title.'</a></li>';  

                                                                    }

                                                                }

                                                                $menu_list.='</ul>';

                                                            }

                                                           $menu_list.='</li>';

                                                        }

                                                    }

                                            $menu_list.='</ul>';

                                        }

                                    $menu_list.='</li>';

                                }

                            }

                                            

                            $menu_list .= '</ul>';

                        

                         }

                         echo $menu_list;

                        ?>

                      </div>

                    </nav>

                </div>

                

                <div class="col-md-1">

                &nbsp;

                </div>

        </div>