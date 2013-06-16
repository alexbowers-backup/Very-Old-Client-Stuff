<?php
/*
Function:	sql_sanitize( $sCode )
Description:	"Sanitize" a string of SQL code to prevent SQL injection.
Parameters:	$sCode
			The SQL code which you wish to sanitize.
Example:	mysql_query('UPDATE table SET value="' . sql_sanitize("' SET id='4'") . '" WHERE id="1"');
Requirements:	PHP version 4 or greater
Notes:		
Author:		engel <engel@engel.uk.to>
*/
function sql_sanitize($sCode) {
	if ( function_exists( "mysql_real_escape_string" ) ) {		// If PHP version > 4.3.0
		$sCode = mysql_real_escape_string( $sCode );		// Escape the MySQL string.
	} else { // If PHP version < 4.3.0
		$sCode = addslashes( $sCode );				// Precede sensitive characters with a backslash \
	}
	return $sCode;							// Return the sanitized code
}
?>