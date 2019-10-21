<?php 

$param = array($interest);
$q = "SELECT controlled_vocab_entry_id FROM controlled_vocab_entry_settings WHERE setting_value = \"$interest\" AND setting_name = 'interest'";
echo $q . "\n\n" ;



$st = $db->prepare($q);
$st->execute($param);
$row = $st->fetch();
$controlled_vocab_entry_id = $row['controlled_vocab_entry_id'];

echo "controlled_vocab_entry_id = " . $controlled_vocab_entry_id . "<br>";

if($st->rowCount() == 0 ){
echo "\n";
// insert
echo "-- Row count = 0 entry doesn't exist so insert it---------------------------" ; 
$q = "INSERT INTO controlled_vocab_entries	(controlled_vocab_entry_id, controlled_vocab_id, seq ) VALUES (null, 465, 0)";

$st = $db->prepare($q);
echo "\n";
echo $q . "\n\n";
$st->execute($param);
$controlled_vocab_entry_id = $db->lastInsertId();


$q = "INSERT INTO controlled_vocab_entry_settings
	(controlled_vocab_entry_id, locale, setting_name, setting_value, setting_type)
	VALUES($controlled_vocab_entry_id, 	'', 'interest', ?, 'string');";
$st = $db->prepare($q);
echo $q . "\n\n";
$st->execute($param);

echo "-- end if ---------------------------------\n\n";

}


$q = "INSERT INTO user_interests (user_id, controlled_vocab_entry_id) VALUES
	($user_id, $controlled_vocab_entry_id	);";
print_r($q);
$st = $db->prepare($q);
$st->execute($param);