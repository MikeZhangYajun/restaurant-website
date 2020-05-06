<?php
class MenuItem
{
	private $itemName,$description,$price;
	function_construct($itemName,$description,$price){
	$this->itemName= $itemName;
	$this->description=$description;
	$this->price=$price;
	}
	function set_itemName($itemName) {
    $this->itemName = $itemName;
  }
  function get_itemName() {
    return $this->itemName;
  }
  
  function set_description($description){
	  $this->description=$description;
  }
  function get_description()
  return $this->$description;
}
function set_price($price){
	 $this->price=$price;
}
function get_price(){
	return $this->price;
}
	}
?>