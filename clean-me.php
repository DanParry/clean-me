<?php

// get the config file
require_once 'config/db.php';
// get the DB class before anything else
require_once 'classes/db.php';
// get the User class
require_once 'classes/user.php';
// get the Users class
require_once 'classes/users.php';
// get the properties class
require_once 'classes/properties.php';

$user = new User();
$user->setPrefix('Mr');
$user->setFirstName("Peter");
$user->setLastName("Johnson");

echo($user->getFirstName());
echo($user->getLastName());
echo "<br><br>".$user->getFullName();

// $user->savePerson();

$specificUser = $user->getPersonByLastName();
echo "{$specificUser[0]->first_name} {$specificUser[0]->last_name}";

$users = new Users();
$allUsers = $users->getUsers();

// display should be kept separate from logic and data elements, so prepare the table here
echo '<table>';
foreach($allUsers as $row) {
	echo "<tr><td>{$row->first_name}</td><td>{$row->last_name}</td></tr>";
}
echo '</table>';

$properties = new Properties();

$data = $properties->GetProperties();

foreach ($data as $value):
	echo $value['address1'] . ", sleeps {$value['berth']} <br />";
endforeach;
