<?php
require_once('./dao/employeeDAO.php');
if(isset($_GET['action'])){
    if($_GET['action'] == "edit"){
        if(isset($_POST['name']) && 
                isset($_POST['phoneNumber']) && 
                isset($_POST['emailAddress'])
				&& isset($_POST['referrer'])){
        
        if(is_numeric($_POST['name']) &&
                $_POST['phoneNumber'] != "" &&
                $_POST['emailAddress'] != ""
				&& _POST[ 'referrer' ]){    
               
                $customerDAO = new customerDAO();
                $result = $customerDAO->editCustoemr($_POST['name'], 
                        $_POST['phoneNumber'], $_POST['emailAddress'],$_POST['referrer' ]);
                

                if($result > 0){
                    header('Location:edit_customer.php?recordsUpdated='.$result.'&employeeId=' . $_POST['employeeId']);
                } else {
                    header('Location:edit_employee.php?employeeId=' . $_POST['employeeId']);
                }
            } else {
                header('Location:edit_employee.php?missingFields=true&employeeId=' . $_POST['employeeId']);
            }
        } else {
            header('Location:edit_employee.php?error=true&employeeId=' . $_POST['employeeId']);
        }
    }
    
    if($_GET['action'] == "delete"){
        if(isset($_GET['_Id']) && is_numeric($_GET['_Id'])){
            $customerDAO = new customerDAO();
            $success = $customerDAO->deleteCustomer($_GET['_Id']);
            echo $success;
            if($success){
                header('Location:index.php?deleted=true');
            } else {
                header('Location:index.php?deleted=false');
            }
        }
    }
}
?>
