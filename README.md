Note:                         
API url is not working so I performed on file.
Please extract entries.json file to run the code in cmd.


Task-1:                      
Code for API descending listing in cmd
php index.php


Task-2:                        
Code for Category limit arguments in cmd              
eg. php categorylimit.php animals 2       
    php categorylimit.php Anime 2       
                       
SQL Task answer:                   
SELECT broker.name as Broker,count(customer.broker_id) as Total_Customer            
FROM broker,customer             
WHERE broker.id=customer.broker_id          
GROUP BY broker.name           
ORDER BY count(customer.broker_id) DESC , broker.name ASC        
    



