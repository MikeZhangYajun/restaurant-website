

<?php

include('includes/header.php');
?>
            
					<?php
					include ('includes/classMenuItem.php');
					$menu= array(); 
					$i=0;
					$s="*";
					while($i<6){
						
					if($i%2==0){
					$menu[$i]=new MenuItem("The WP Burge".$s.($i+1),"Freshly made all-beef patty served up with homefries", "$14");}
					else {
					$menu[$i]=new MenuItem("WP Kebobs".$s.($i+1), "Tender cuts of beef and chicken, served with your choice of side","$17");}

					$i++;
					$s.="*";
					}
					?> 
					<div id="content" class="clearfix">
                <aside>
                        <h2><?php date_default_timezone_set('US/Eastern'); echo date("l"); ?>'s Specials</h2>
                        <hr>
                        <img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">
						
                        <h3><?php echo $menu[0]->get_itemName();?></h3>
                        <p><?php echo $menu[0]->get_description();?> - <?php echo $menu[0]->get_price();?></p>
                        <hr>
                        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                         <h3><?php echo $menu[1]->get_itemName();?></h3>
                        <p><?php echo $menu[1]->get_description();?> - <?php echo $menu[1]->get_price();?></p>
                        <hr>
						<img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">						
                        <h3><?php echo $menu[2]->get_itemName();?></h3>
                        <p><?php echo $menu[2]->get_description();?> - <?php echo $menu[2]->get_price();?></p>
						<hr>
						<img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                         <h3><?php echo $menu[3]->get_itemName();?></h3>
                        <p><?php echo $menu[3]->get_description();?> - <?php echo $menu[3]->get_price();?></p>
                        <hr>
						<img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">						
                        <h3><?php echo $menu[4]->get_itemName();?></h3>
                        <p><?php echo $menu[4]->get_description();?> - <?php echo $menu[4]->get_price();?></p>
						<hr>
						<img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                         <h3><?php echo $menu[5]->get_itemName();?></h3>
                        <p><?php echo $menu[5]->get_description();?> - <?php echo $menu[5]->get_price();?></p>
                        <hr>
			
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->


 <?php
include ('includes/footer.php');
?>