
## Shop-Apotheke Back-end Coding Challenge 
I have used Laravel as back-end php framework.

The service should be able to provide:
- A list of the most popular GitHub repositories, sorted by number of stars.
- An option to be able to view the top 10, 50, 100 repositories should be available.
- Given a date, the most popular repositories created from this date onwards should be returned.
- A filter for the programming language would be a great addition to have.

I have created a REST API to parse data from GitHub REST API.

## notice
try to choose language input in the api because it seems if we don't choose any query input like setting language github does not answer correctly , I mean it works the results is not correct
for example: 

[to see github api from start date and sort by stars click here](https://api.github.com/search/repositories?q=created:>2008-01-01&sort=star)

as you can see it does not answer correctly if you don't define the language or a query string

## API Video Introduction 
 [https://payam.pro/githubRepositories.mp4](https://payam.pro/githubRepositories.mp4) 

## API Live heroku App URL
- [https://apothekeshop.herokuapp.com](https://apothekeshop.herokuapp.com)
- [https://apothekeshop.herokuapp.com/api/repositories/search](https://apothekeshop.herokuapp.com/api/repositories/search)
- [https://apothekeshop.herokuapp.com/api/repositories/search?per_page=50&language=php](https://apothekeshop.herokuapp.com/api/repositories/search?per_page=50&language=php)
## How to Setup project

- run command : `composer install`
- change `.env.example` File to `.env` you don't need to setup database because we don't use database in this project.
- ( Optional ) set GITHUB_URL=https://api.github.com in the .env file 
- run command : `php artisan key:generate`
- run command : `php artisan serve`

to run tests you can use this command in terminal (command line):

 `php artisan test`
 
 or
 
 `./vendor/bin/phpunit`

## notice
in free version of REST_API you can send 30 requests per minutes to the GitHub Apis but if you want to send more then we should use the github access token, and create one. and add it as bearer header token to our requests.

## more informations

GitHub REST API documenation: [https://developer.github.com/v3/ ](https://developer.github.com/v3/) 

## Made By :
Payam Ghader Kourehpaz [https://payam.pro](https://payam.pro)
