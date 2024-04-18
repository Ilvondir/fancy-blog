# Fancy Blog

Fancy Blog is a web application built using the Laravel framework with an MVC architecture, meaning it is server-side application. The visual design of the application has been crafted using the Materialize framework.

The application showcases popular aspects of social media services such as tags and comments, which are represented in the database as many-to-many and one-to-many relationships, respectively.

For guests, the application allows browsing blog articles and registering. Logged-in users can additionally comment on all articles. Users in the journalist role can add new tags, write articles and edit their own. The administrator has full control over tags, articles, and comments.

## Used Tools
- HTML 5
- CSS 3
- JavaScript ES6
- PHP 8.3.6
- Laravel 11.4.0
- Materialize 1.0.0

## Requirements

For running the application you need:

- [MySQL](https://www.mysql.com)
- [PHP](https://www.php.net/manual/en/install.windows.php)
- [composer](https://getcomposer.org)

## How to run

1. Execute command `git clone https://github.com/Ilvondir/fancy-blog`.
2. Create `fancy_blog` database.
3. Run `start.bat` file.
4. Log in to the selected account to discover various functionalities.

| Account         | Email	              |   Password  |
|:---------------:|:---------------------:|:-----------:|
| Administrator   | admin@fb.com          |  password   | 
| Journalist 	  | journalist@fb.com     |  password   |
| User            | user@fb.com           |  password   |


## First Look

![firstlook1](public/img/firstlook1.png?raw=true)
![firstlook2](public/img/firstlook2.png?raw=true)
