**Simple Chat Backend PHP**

[![CI Status](https://circleci.com/gh/maxmousee/simple_chat_php.svg?style=shield&circle-token=:circle-token)](https://circleci.com/gh/maxmousee/simple_chat_php)

[![BCH compliance](https://bettercodehub.com/edge/badge/maxmousee/simple_chat_php?branch=master)](https://bettercodehub.com/)

----

  <Send and receive messages using a JSON API._>
  
  Written using PHP 7 and SQLite3.
  
  How to run:
  copy all files into a webserver - tested using Apache
  
  How to run tests:
    'phpunit tests'
  
  How to test:
  'curl -X GET http://localhost:8080/api/getMessages?username=maxmouse'

  * **URL**

  <_/api/getUserByUserName>

* **Method:**
  
  <_Get User by User Name_>

  `GET`

* **Data Params**

  **Required:**
   
     `username=[username]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{"id":42,"username":"maxmouse"}`
 
* **Error Response:**

  <_If the user does NOT exist._>

  * **Code:** 404 Not Found <br />
    **Content:** ``

  * **Error Response:**

  <_Username field is missing or invalid._>

  * **Code:** 400 Bad Request <br />
    **Content:** ``

* **URL**

  <_/api/addUser_>

* **Method:**
  
  <_Add user_>

  `POST`

* **Data Params**

  **Required:**
   
     `username=[username]`

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** ``
 
* **Error Response:**

  <_If the user data is invalid or username is already taken._>

  * **Code:** 400 Bad Request <br />
    **Content:** ``

* **URL**

  <_/api/getMessages_>

* **Method:**
  
  <Get all messages for an user_>

  `GET`

* **Data Params**

  **Required:**
   
     `username=[username]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id":"5","user_id":"43","from_user":"42","message":"oioioio","time":"2018-12-03 00:43:59"},{"id":"4","user_id":"43","from_user":"42","message":"saiuho328","time":"2018-12-03 00:43:46"}]`

* **Error Response:**

  <_If the user data is invalid or username is already taken._>

  * **Code:** 400 Bad Request <br />
    **Content:** ``

* **URL**

  <_/api/sendMessage_>

* **Method:**
  
  <_Send message to an user_>

  `POST`

* **Data Params**

  **Required:**
   
     `to=[username]`
     `from=[username]`
     `text=[message text]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** ``
 
* **Error Response:**

  <_If the sender or recepient user does NOT exists in the database or any field is missing._>

  * **Code:** 400 Bad Request <br />
    **Content:** ``
 

* **Notes:**

<_Things to improve: unit tests, add functional tests, error handling._> 