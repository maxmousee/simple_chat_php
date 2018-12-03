**Simple Chat Backend PHP**

[![CI Status](https://circleci.com/gh/maxmousee/simple_chat_php.svg?style=shield&circle-token=:circle-token)](https://circleci.com/gh/maxmousee/simple_chat_php)

----
  <Send and receive messages using a JSON API._>
  
  Written using PHP 7 and SQLite3.
  
  How to run:
  copy all files into a webserver - tested using Apache
  
  How to run tests:
  TODO
    'mvn test'
  
  How to test:
  'curl -X GET http://localhost:8080/api/getMessages?username=maxmouse'

* **URL**

  <_/api/createUser_>

* **Method:**
  
  <_Add user_>

  `POST`

* **Data Params**

  **Required:**
   
     `username=[username]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** ``
 
* **Error Response:**

  <_If the user data is invalid._>

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

  <_If the user data does NOT exists in the database or a field is missing._>

  * **Code:** 400 Bad Request <br />
    **Content:** ``
 

* **Notes:**

<_Things to improve: unit tests, docker support, better separation in modules and error handling._> 