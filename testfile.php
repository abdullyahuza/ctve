<pre>
<?php 
include 'core/init.php';

//initiate db instance
$db = DB::getInstance();

// $operators = array('=','>','<','>=','<=');
/**********************************************
	GET:
		parameters:
			table,
			array: WHERE: array(Field, operator, value) [optional]
		returns:
			array of row objects
***********************************************/

//SELECT * FROM users; | returns an array of rows as objects
$all_users = $db->get('users')->results();

//SELECT * FROM users WHERE id = 1; | returns db object with result
$specific_users1 = $db->get('users', array('id','=',1));
$specific_users2 = $db->get('users', array('username','=','abdullyahuza'));

//SELECT * FROM users WHERE role = 'staff'; | returns all users that satisfy the condition
$more_specific = $db->get('users',array("role","=","staff"));

//SELECT * FROM users WHERE role = 'staff'; | returns the 1st user that satisfy the condition
$more_specific = $db->get('users',array("role","=","staff"))->first();


/**********************************************
	QUERY:
		parameters:
			sql statement
		return:
			array of row objects

***********************************************/	
//returns an array of objects as rows
$user = $db->query("SELECT * FROM users WHERE role = 'staff' AND img IS NOT NULL")->first();



/******************************************************************
	ACTION: 
		parameters:
			sql keyword: UPDATE, SELECT *, DELETE
			table,
			array: WHERE: array(field, operator, value) [optional]
*******************************************************************/

$action = $db->action("SELECT *", 'users', array('username','=','abdullyahuza'))->results();


/******************************************************************
	DELETE:
		parameters:
			table,
			array: WHERE: array(field, operator, value)
*******************************************************************/
$delete = $db->delete('users', array('id','=','24'));


/******************************************************************
	INSERT:
		parameters:
			table,
			array: array(field => value, ...)
*******************************************************************/

$newUser = array(
	'username' => "JamiluTahir",
	'email' => "jamiltahir010@gmail.com",
	'title' => "Mr.",
	'gsm' => "08035057227",
	'password' => "08035057227",
	'name' => "Jamilu Tahir",
	'joined' => "2020-10-23 18:20:08",
	'group' => 2,
	'role' => "staff",
	'img' => "JamiluTahir.JPG"
);
// $db->insert('users', $newUser);

/******************************************************************
	UPDATE:
		parameters:
			table,
			id,
			array: array(field => value, ...)
*******************************************************************/
$updateUser = array(
	'gsm' => "08122727777",
	'role' => "hod"
);
$db->update('users','25',$updateUser);
$new_user_id = $db->get('users', array('username','=','abdullyahuza'))->first();

print_r($new_user_id->id);


?>	
</pre>