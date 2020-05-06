<?php
	class Customer{
		private $customerId;
		private $customerName;
		private $phoneNumber;
		private $emailAdress;
		private $referrer;
		private $deletedCustomerNames;
		
		function __construct($customerId,$customerName, $phoneNumber, $emailAddress ,$referrer,$deletedCustomerNames){
			$this->setCustomerId($customerId);
			$this->setCustomerName($customerName);
			$this->setPhoneNumber($phoneNumber);
			$this->setEmailAddress($emailAddress);
			$this->setReferrer($referrer);
			$this->setDeletedCustomerNames($deletedCustomerNames);
		}
		
		public function  getCustomerId(){
			return $this->customerId;
		}
		public function setCustomerId($customerId){
			$this->customerId=$customerId;
		}
		
		public function getcustomerName(){
			return $this->customerName;
		}
		
		public function setCustomerName($customerName){
			$this->customerName = $customerName;
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phoneNumber){
			$this->phoneNumber = $phoneNumber;
		}
		
		public function getEmailAddress(){
			return $this->emailAddress;
		}
		
		public function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress;
		}
		
		public function getReferrer(){
			return $this->referrer;
		}
		
		public function setReferrer($referrer){
			$this->referrer = $referrer;
		}
		public function  getDeletedCustomerNames(){
			return $this->deletedCustomerNames;
		}
		public function setDeletedCustomerNames($deletedCustomerNames){
			$this->deletedCustomerNames=$deletedCustomerNames;
		}
		
		
	}
?>