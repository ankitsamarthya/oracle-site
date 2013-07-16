<?php
require_once("database.php");
class Faculty {
	private static $table_name = "faculty";
	private static $db_fields = array('fid','name','designation','school','post','division','cabin','phno','email','imageLink');
	public $fid;
	public $name;
	public $designation;
	public $school;
	public $post;
	public $division;
	public $cabin;
	public $phno;
        public $email;
        public $imageLink;
 
//for photoupload
public static function find_all_faculty(){
	global $database;
	$result_set= self::find_by_sql("SELECT * FROM ". self::$table_name);
	return $result_set;
}

public static function find_by_sql($sql=""){
	global $database;
	$result_set= $database->query($sql);
	$object_array=array();
	while($row = $database->fetch_array($result_set)){
		$object_array[]= self::instantiate($row);
	}
	return $object_array;
}

private static function instantiate($record){
	$object =new Faculty();
	foreach($record as $attribute=>$value){
		if($object->has_attribute($attribute)){
			$object->$attribute =$value;
		}
	}
	return $object;
}
private function has_attribute($attribute){
	//get_object_vars is a function that returns a associative array with all attributes as keys and there values as value(incl. private) 
	$object_vars = $this->attributes();
	//we just need to check wether the key exist of not , we return true or false
	return array_key_exists($attribute ,$object_vars);
}

private function attributes(){
	$attributes = array();
	foreach(self::$db_fields as $field){
		if(property_exists($this, $field)){
			$attributes[$field] = $this->$field;  
		}
	}
	return $attributes;
}
private function sanitized_attributes(){
	global $database;
	$clean_attributes = array();
	foreach($this->attributes() as $var => $value){
		$clean_attributes[$var]= $database->escape_value($value);
	}
	return $clean_attributes;
}

}
?>