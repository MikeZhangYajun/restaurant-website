<?php
require_once('abstractDAO.php');
require_once('./customer.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customerDAO
 *
 * @author Matt
 */
class customerDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    /*
     * This is an example of how to use the query() method of a mysqli object.
     * 
     * Returns an array of <code>Employee</code> objects. If no employees exist, returns false.
     */
    public function getCustomers(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $customer = new customer($row['_Id'],$row['customerName'], $row['phoneNumber'], $row['emailAddress'],$row['referrer'],$row['deletedCustomerNames']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    
    /*
     * This is an example of how to use a prepared statement
     * with a select query.
     */
    public function getCustomer($customerId){
        $query = 'SELECT * FROM mailingList WHERE _Id = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
           
		   $customer = new Customer($temp[_Id],$temp['CustomerName'], $temp['phoneNumber'], $temp['emailAddress'],$temp['referrer'],$temp['deletedCustomerNames']);
		}
		   $result->free();
            return $customer
       
        $result->free();
        return false;
	   
    } 
	
	  public function getRemovedCustomers(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList where deletedCustomerNames<>"na"');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $customer = new customer($row['_Id'],$row['customerName'], $row['phoneNumber'], $row['emailAddress'],$row['referrer'],$row['deletedCustomerNames']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }

    public function addCustomer($customer){
        /* if(!is_numeric($customer->getEmployeeId())){
            return 'EmployeeId must be a number.';
        } */
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            $query = 'INSERT INTO mailingList(customerName,phoneNumber,emailAddress,referrer,deletedCustomerNames)  VALUES (?,?,?,?,?)';
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
            $stmt = $this->mysqli->prepare($query);
            //The first parameter of bind_param takes a string
            //describing the data. In this case, we are passing 
            //three variables: an integer(employeeId), and two
            //strings (firstName and lastName).
            //
            //The string contains a one-letter datatype description
            //for each parameter. 'i' is used for integers, and 's'
            //is used for strings.
			if($stmt){
				    $customerNmae=customer->getCustomerName(), 
                    $phoneNumber=customer->getPhoneNumber(), 
                    $emailAddress=customer->getEmailAddress(),
					$referrer=customer->getReferrer(),
					$deletedCustomerNames=customer->getDeletedCustomerNames());
				
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
                return $customer->getCustomerNameName() . ' ' . $customer->getPhoneNumber() . ' ' . $customer->getEmailAddress(). ' ' . $customer->getReferrer().' '.$Customer->getDeletedCustomerNames().' added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
    
    public function deleteCustomer($customerId){
        if(!$this->mysqli->connect_errno){
			$old= $this->getCustomer($customerId);
			$old->setDeletedCustomerNames($old->getCustomerName().''.$old->getPhoneNumber().''.$old->getEmailAddress());
			$old->setCustomerId=0;
			$this->addCustomer($old);
            $query = 'DELETE FROM mailingList  WHERE _Id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $_Id);
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
    


?>