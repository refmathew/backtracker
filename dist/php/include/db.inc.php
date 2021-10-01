<?php
 $servername = "localhost";  
 $username = "root";                  
 $password = "";                      
 $database = "tracker";                      
                                       
 $conn = new mysqli($servername, $username, $password, $database);

 /* Connect to database */                                                                                
 if ($conn->connect_error) {                                                                              
   die("Connection failed: " . $conn->connect_error);                                                     
 }                                                                                                        
