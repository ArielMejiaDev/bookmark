<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

A repository with a sample application for "Testing an API" talk in Applaudo Developer Conference 2021.

## Instructions to install it

Clone the project:
```bash
git clone git@github.com:ArielMejiaDev/bookmark.git

// or 

git clone https://github.com/ArielMejiaDev/bookmark.git
```

Install the dependencies:

```bash
cd bookmark

composer install

npm install
```

## Context

The app has a UI, so you can see the UI and register a user in:

- `http://bookmark.test` using Laravel Valet.
- `http://localhost:3000` using `php artisan serve` command.

## To use the API:

Login as an Admin:
    email: admin@mail.com
    password: password

Login as an Editor:
    email: editor@mail.com
    password: password

Login as a guest user:
    email: user@mail.com
    password: password

Or register in `http:bookmark.test/register` and use this credentials as a guest.

## API Endpoints

You can download and import the endpoint postman collection & environment:

Postman endpoints collection: https://drive.google.com/file/d/1csXe4bsVxxFATaL8kA9wAitW4YN3PtED/view?usp=sharing

Postman environment: https://drive.google.com/file/d/1S7vWn1xwz1LXdG-aN3Pk0-uRDZAZPAQJ/view?usp=sharing

Or use the endpoints as below:

### Login
POST request to `http://bookmark.test/api/login`

Body:

```json
{
    "email":"admin@mail.com",
    "password":"password"
}
```

### Get all the user recipes
GET request to: `http://bookmark.test/api/recipes`

Remember to add the `Bearer Token` that login request returns.

### Get all recipes
GET request to: `http://bookmark.test/api/manage/recipes`

Remember to add the `Bearer Token` that login request returns.

### Get a specific recipe
GET request to: `http://bookmark.test/api/manage/recipes/{recipe_id}`

Remember to add the `Bearer Token` that login request returns.

### Create a recipe
POST request to: `http://bookmark.test/api/manage/recipes/`

Remember to add the `Bearer Token` that login request returns.

Body:

```json
{
    "title": "User recipe created",
    "content": "user recipe content created"
}
```

### Update a recipe
PUT request to: `http://bookmark.test/api/manage/recipes/{recipe_id}`

Remember to add the `Bearer Token` that login request returns.

Body:

```json
{
    "title": "User recipe created",
    "content": "user recipe content created"
}
```

### Delete a recipe
DELETE request to: `http://bookmark.test/api/manage/recipes/{recipe_id}`

Remember to add the `Bearer Token` that login request returns.

It would not return any content, just the no content status.
