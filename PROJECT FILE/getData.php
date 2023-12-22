<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// database connection info
$dbDetails = array(
    'host' => 'localhost',
    'user' => '',
    'pass' => '',
    'db' => 'kalam',
);

// table
$table = 'crm_lead_master_data';
$primaryKey = 'Lead_ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` represents the column name in the database
//`dt` represents the DataTables column identifier.
$columns = array(
    array( 'db' => 'Name', 'dt' => 0 ),
    array( 'db' => 'Mobile', 'dt' => 1 ),
    array( 'db' => 'Alternate_Mobile', 'dt' => 2 ),
    array( 'db' => 'Whatsapp', 'dt' => 3 ),
    array( 'db' => 'Email','dt' => 4 ),
    array( 'db' => 'Interested_In', 'dt' => 5 ),
    array( 'db' => 'Source', 'dt' => 6 ),
    array( 'db' => 'Status', 'dt' => 7 ),
    array( 'db' => 'DOR', 'dt' => 8 ),
    array( 'db' => 'Caller', 'dt' => 9 ),
    array( 'db' => 'State', 'dt' => 10 ),
    array( 'db' => 'City', 'dt' => 11 ),
    array( 'db' => 'Caller_ID', 'dt' => 12 ),
    array( 
        'db'        => 'created', 
        'dt'        => 13, 
        'formatter' => function( $d, $row ) { 
            return date( 'jS M Y', strtotime($d)); 
        } 
    ), 
    array( 
        'db'        => 'status', 
        'dt'        => 14, 
        'formatter' => function( $d, $row ) { 
            return ($d == 1)?'Active':'Inactive'; 
        } 
    ) 
); 
 
// Include SQL query processing class 
require ('ssp.class.php'); 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns)
); 
?>


