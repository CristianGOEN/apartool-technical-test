## Installation
***
Clone this repository `git clone https://github.com/CristianGOEN/apartool-technical-test.git`

Execute docker with `docker-compose up`

Run composer with `composer install`

Serve the application with `php artisan serve`

## Run migrations & factories
***
Use `php artisan migrate` to run migrations

Use `php artisan db:seed` to run factories

## How to run tests
***
Use `vendor\bin\phpunit tests` to run tests

##Architecture
***
Used TDD and DDD with hexagonal architecture applying solid, closer approach to CQRS using DTO's to transfer data between layers, making easy to use a command bus in the future.

I added a bounded context called Estate to represent a boundary for these domain models:

- apartments
- categories
- apartments_categories

I also added a new table called categories since most of the categories attached to apartments probably will be the same and in the other hand we can mass update categories when needed saving us time.

##TDD
***
- Used TDD as example for all the Apartment section, in a real project I would use TDD on all project but since it's a technical test only did Apartments as an example.

##DTO's
***
- I use request and response dto's because we don't want to expose our domain, so we choose which information will be sent.

##Database
***
- The big problem here is having eloquent ORM coupled, so when we need to work with repositories our domain will transform in to laravel models or backwards.
- Models use SoftDelete mode.


###Apartments
- I have added a new field called "updated_at".
- For security purposes and databases compatibility I have removed the autogenerated ID and ext_id and used and uuid field (generated with Ramsey library).

###Categories
- On the new table categories I extracted the title and description from apartments_categories.
- Added timestamps and active boolean. 
- For the id I followed the same rule on my domain, stick using uuids for models.

###ApartmentsCategories
- There will be the apartment ID and category ID


##Testing
***
- For testing models/requests/responses I have used ObjectMother pattern.
- For testing Use Cases I have used Mocks.
- For testing Integration I have used a real db connection.

##Routes
***
For a valid uuid generator you can check this website: https://www.uuidgenerator.net/

Get parameters by default only show 10 results, for more use the optional parameter called page.
###Apartments
- GET: /apartments
  
_Optional parameter_
```
?page=2
```

- POST: /apartments
  
_Parameters:_
```
id=[uuid]
```
```
name=[string]
```
```
description=[string]
```
```
quantity=[integer]
```
```
active=[boolean]
```
- PUT: /apartments

_Parameters:_
```
id=[uuid]
```
```
name=[string]
```
```
description=[string]
```
```
quantity=[integer]
```
```
active=[boolean]
```
- DELETE: /apartments/{id}

_No parameters_



###Categories
- GET: /categories

_Optional parameter_
```
?page=2
```

- POST: /categories

_Parameters:_
```
id=[uuid]
```
```
title=[string]
```
```
description=[string]
```
```
active=[boolean]
```
- PUT: /categories

_Parameters:_
```
id=[uuid]
```
```
title=[string]
```
```
description=[string]
```
```
active=[boolean]
```
- DELETE: /categories/{id}

_No parameters_


###Apartments categories
- GET: /apartments/{apartmentId}/categories

_Optional parameter_
```
?page=2
```

- POST: /apartments/{apartmentId}/categories

_Parameters:_
```
categoryId=[uuid]
```

- DELETE: /apartments/{apartmentId}/categories/{categoryId}

_No parameters_