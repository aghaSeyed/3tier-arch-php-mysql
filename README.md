# 3tier-arch-php-mysql
A simple implementation of 3 tiers architecture using PHP MySQL and SQL queueing system 

![image](https://user-images.githubusercontent.com/46084995/178139220-a24b7c7a-5552-4acc-a390-5d9f8cb94620.png)

in client side we have a table that can do 4 basics sql function including select , insert , delete , update
on the logic layer decide what should to do with posted inputs of presentation layer and comminucate with DB layer
We have also queue system for running sql which can be helpful in large scale projects
![image](https://user-images.githubusercontent.com/46084995/178139073-91dee408-d298-42c8-83f9-c16389c66d9b.png)

## Installation
First you should clone this project using the below command.

```
git clone https://github.com/aghaSeyed/3tier-arch-php-mysql.git
```

Then you must run migration.php file on browser .
