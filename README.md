# ApiLaravel
An API in Laravel for a Pharmacy Application make with Laravel Passport


Ressources that I use are :

https://dev.to/kingsconsult/how-to-create-a-secure-crud-restful-api-in-laravel-8-and-7-using-laravel-passport-31fh   

http://laravel.sillo.org/laravel-8/   

https://laravel.com/docs/8.x/


Models are : 

Products (id, name, price, quantity, id_pharmacie(foreign key) )

Assurance (id, name, responsable, contacts)

Pharmacie (id, name, responsable, contacts)

An Pharmacy can have many Assurances and an Assurance can have many Pharmacies


A product can be found in many Pharmacies but when we take a Pharmacy, it have just one of each product with their quantity specified
