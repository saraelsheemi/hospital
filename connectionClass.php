<?php 


class Connection { 

 function __construct()
   {
       @$con = mysql_connect("localhost","root",""); 
		mysql_select_db("hospital"); 
   }
   function execute($query)
   {
      
       return mysql_query($query); 
   }

   function __destruct() { 
   	mysql_close();
   }
}

?>