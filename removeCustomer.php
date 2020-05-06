

<?php
require_once('./dao/customerDAO.PHP');

if (isset($_GET['action'])){

if ($_GET['action']=="delete"){
	if(isset($_GET['_id'])){
		$customerDAO= new customerDAO();
		$result=$customerDAO->deleteCustomer($_GET['_id']);
		echo $result;
		if($result){
			header('Location:mailing_list.php?deleted= true');
		}
		else{
			header('Location:mailing_list.php?deleted= false');
		}
	}
}
}
?>


<?php
include('includes/header.php');
?>

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
                    <h1> Removed users lists</h1>
                    <br>
				<?php
						$customerDAO= new customerDAO();
						$customers=$customerDAO->getRemovedCustomers();
						if($customers){
							echo ' <table border =\'1\'>';
							echo '<tr><th>Id</th><th>Name</th><th>phone Number</th><th>email Address</th><th>referrer</th></tr>';
							foreach($customers as $customer){
								echo '<tr>';
								echo '<td>'.$customer->getCustomerId().'</td>';
								echo '<td>'.$customer->getCustomerName().'</td>';
								echo '<td>'.$customer->getPhoneNumber().'</td>';
								echo '<td>'.$customer->getEmailAddress().'</td>';
								echo '<td>'.$customer->getReferrer().'</td>';								
							}
						}
                ?>

				</div>				
		</div>


