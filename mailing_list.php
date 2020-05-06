<?php
require_once('./dao/customerDAO.php');
?>
<?php
include('includes/header.php');
?>
<!DOCTYPE html>
<html>

		<script type="text/javascript">
			function confirDelete(customerName){
				return confirm("Do you wish to delete" + customerName +"?");
			}
		</script>
		<div id="content" class="clearfix">
		 <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
         </aside>
                <div class="main">
                    <h1> Mailing list</h1>
                    <br>
					<?php
						if(isset($_GET['deleted'])){
							if($_GET['deleted']==true){
								echo '<h3>customer Deleted</h3>';
							}
						}
					?>
					<?php
						$customerDAO= new customerDAO();
						$customers=$customerDAO->getCustomers();
						if($customers){
							echo ' <table border =\'1\'>';
							echo '<tr><th>Name</th><th>phone Number</th><th>email Address</th><th>referrer</th><th>Interact</th></tr>';
							foreach($customers as $customer){
								echo '<tr>';
								echo '<td>'.$customer->getCustomerName().'</td>';
								echo '<td>'.$customer->getPhoneNumber().'</td>';
								echo '<td>'.$customer->getEmailAddress().'</td>';
								echo '<td>'.$customer->getReferrer().'</td>';
								echo '<td>
										<a onclick="return confirmDelete(\''.$customer->getCustomerName().'\')"
											href="removeCustomer.php?action=delete&_id='.$customer->getCustomerId().'">
										<input style=\'width:100%\' type=\'button\' value=\'delete\'></a>
										</td>';
								echo '</tr>';
							}
							echo '</table>';
						}
						?>
					</div>
				</div>
</html>		
<?php  
        

include('includes/footer.php');
?>
