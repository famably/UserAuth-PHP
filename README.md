# Prerequisites for the task

- Install PHP with SQLite (if you are on mac this will come preinstalled when you brew install php)

# Introduction

The code inside index.php contains a simple UserAuth class which can register and log in a user. Users are stored inside an SQLite database. At the end of the file there is some code instantiating the class and testing the register and log in functions.
The code is incomplete and contains some bugs, as well as not following some best practices. There are also some TODOs that have been left in the code.

# Instructions

We would like you to fix the bugs so that the script runs without exceptions.
Implement the TODOs, and think about how the code might be brought into line with modern PHP practices, for example using typing for variables and return types in method declarations.
There might also be some potential security issues with the code, if you imagine the input for the register/login methods might come from an external user.

Essentially don't be afraid of changing too much, give the code a good tidy up and get it to a production ready standard. This task should take somewhere between 1-2 hours, as a ballpark.

When complete, zip your code and email it back to us.

# Running the script
`php index.php`

# Bonus task
Implement a UserRepository class for handling the database interactions, and refactor out the code. This can be added to the same index.php file for simplicity.
