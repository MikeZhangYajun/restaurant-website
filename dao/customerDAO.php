<?php
require_once('abstractDAO.php');
require_once('./customer.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class customerDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    

    public function getCustomers(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList where deletedCustomerNames="na"');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new customer object, and add it to the array.
                $customer = new Customer($row['_id'],$row['customerName'], $row['phoneNumber'], $row['emailAddress'],$row['referrer'],$row['deletedCustomerNames']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    
	
	
	
	
	public function getCustomer($customerId){
        $query = 'SELECT * FROM mailingList WHERE _id = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $customer = new Customer($temp['_id'],$temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'],$temp['referrer'],$temp['deletedCustomerNames']);
            $result->free();
            return $customer;
        }
        $result->free();
        return false;
    }
       
	
	  public function getRemovedCustomers(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList where deletedCustomerNames<>"na"');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new customer object, and add it to the array.
                $customer = new Customer($row['_id'],$row['customerName'], $row['phoneNumber'], $row['emailAddress'],$row['referrer'],$row['deletedCustomerNames']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }

    public function addCustomer($customer){
       
        if(!$this->mysqli->connect_errno){
            
            $query = 'INSERT INTO mailingList(customerName,phoneNumber,emailAddress,referrer,deletedCustomerNames)  VALUES (?,?,?,?,?)';
            
            $stmt = $this->mysqli->prepare($query);
            
			if($stmt){
				    $customerName=$customer->getCustomerName(); 
                    $phoneNumber=$customer->getPhoneNumber(); 
                    $emailAddress=$customer->getEmailAddress();
					$referrer=$customer->getReferrer();
					$deletedCustomerNames=$customer->getDeletedCustomerNames();
				
            $stmt->bind_param('sssss', 
                    $customerName, 
                    $phoneNumber, 
                    $emailAddress,
					$referrer,
					$deletedCustomerNames);
            //Execute the statement
            $stmt->execute();
            //If there are errors, they will be in the error property of the
            //mysqli_stmt object.
            if($stmt->error){
                return $stmt->error;
            } else {
                return 'Added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
	}
	
	
	public function deleteCustomer($customerId){
        if(!$this->mysqli->connect_errno){
			$old= $this->getCustomer($customerId);
			$old->setDeletedCustomerNames($old->getCustomerName().''.$old->getPhoneNumber().''.$old->getEmailAddress());
			$old->setCustomerId=0;
			$this->addCustomer($old);
            $query = 'DELETE FROM mailingList  WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $customerId);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    

    }
    
	

?>