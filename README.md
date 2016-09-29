# _Hair Salon_

####_A basic app practicing one-to-many relationships for a hair salon to keep track of their stylists and their respective clients. 09/29/2016_

#### By _**Anand Angalig**_


## Description

_The owner is able to add stylists, and for each stylist, add clients who see that stylist. The stylists work independently, so each client only belongs to a single stylist._


## Setup/Installation Requirements

* _If you wish to view the source code locally on your machine please follow the following steps:_

    * _Navigate to the directory in which you want the project to reside_

    * _Enter the following command into your terminal:_
        _git clone https://github.com/anandangalig/hair-salon.git_

    * _Navigate to the cloned directory, and execute the following command in the terminal:_
          _composer install_

    * _Start your local hosting program, such as MAMP, and set the Web Server preference to highest level of the  downloaded repository file_

    * _To start the MySQL, go to the terminal and execute:_
        _/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot_

    * _Navigate to the web directory and start your local host by executing the following command in your terminal:_
          _php -S localhost:8000_

    * _Open up the browser of your choice and go to the following url:_
          _http://localhost:8000/_

    * _If you wish to look at the source code, feel free to browse through the files in the directory_


## User Stories:

* _As the administrator, he/she/they is able to see all stylists and clients on the main page_

* _As the administrator, he/she/they is able to create new stylist_

* _As the administrator, he/she/they is able to delete individual stylists, as well as all stylists_

* _As the administrator, he/she/they is able to create and assign clients to a specific stylist_

* _As the administrator, he/she/they is able to see all assigned clients of a given stylist_

* _As the administrator, he/she/they is able to update/delete individual clients, as well as all clients_



## MySQL Commands Used:

* _CREATE DATABASE hair_salon;_
* _USE hair_salon;_
* _CREATE TABLE stylists (stylist_name VARCHAR (255), id serial PRIMARY KEY);_
* _CREATE TABLE clients (client_name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);_




## Known Bugs

_Lacking update functionality for the Stylist name._


## Support and Contact Details

_Please feel free to contact us at:_
    _anandangalig@gmail.com_

## Technologies Used

* _silex v~2.0_
* _twig v~1.0_
* _phpunit v5.5.*_
* _MAMP_



### License
_Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:_

_The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software._

_THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE._

Copyright (c) 2016 **_Anand Angalig_**
