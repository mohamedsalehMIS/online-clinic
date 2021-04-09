<?php 


    /*
	** title functions that echo the page title in case the page 
	** has the variable $pagetitle and echo defult title for other pages
	*/

	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;
		} else {
			echo 'defult';
		}
	}







?>