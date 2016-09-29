# __

####_A basic app that returns how frequently a word appears in a given string. 09/16/2016_

#### By _**Anand Angalig**_


## Description

_The user inputs both the word and the string of words to check within. The application will search for full word matches only and output the number of times the word was repeated._


## Setup/Installation Requirements

* _If you wish to view the source code locally on your machine please follow the following steps:_

    * _Navigate to the directory in which you want the project to reside_

    * _Enter the following command into your terminal:_
        _git clone https://github.com/anandangalig/word-frequency.git_

    * _Navigate to the cloned directory, and execute the following command in the terminal:_
          _composer install_

    * _Navigate to the web directory and start your local host by executing the following command in your terminal:_
          _php -S localhost:8000_

    * _Open up the browser of your choice and go to the following url:_
          _http://localhost:8000/_

    * _If you wish to look at the source code, feel free to browse through the files in the directory_


## Specs

* _User enters a word to search in a string without a match_
 * _IN: "apple" in "orange"_
 * _OUT: Repeated 0 times. There were no matches found_

* _User enters a word to search in a string with a match_
 * _IN:  "apple" in "apple"_
 * _OUT: Repeated 1 time_

* _User enters a word to search within a two-word string with a match_
  * _IN:  "apple" in "apple orange"_
  * _OUT: Repeated 1 time_

* _User enters a word to search within a full sentence_
 * _IN: "apple" in "An apple a day keeps the doctor away."_
 * _OUT: Repeated 1 time_

* _User enters a word to search within a paragraph with repeated matches_
 * _IN: "apple" in "In taste an apple is tasty and juicy, and has various tastes from sour to sweet. One can eat an apple raw, cooked, or baked, and it can be used in various dishes, such as apple sauce apple compote, apple pie, apple strudel, etc."_
 * _OUT: Repeated 6 times_

## MySQL Commands Used:
* _CREATE DATABASE hair_salon;_
* _USE hair_salon;_
* _CREATE TABLE stylists (stylist_name VARCHAR (255), id serial PRIMARY KEY);_
* _CREATE TABLE clients (client_name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);_
* _User enters a word to search within a full sentence_



## Known Bugs

_None yet_


## Support and Contact Details

_Please feel free to contact us at:_
    _anandangalig@gmail.com_

## Technologies Used

* _silex v~2.0_
* _twig v~1.0_
* _phpunit v5.5.*_



### License
_Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:_

_The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software._

_THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE._

Copyright (c) 2016 **_Anand Angalig_**
