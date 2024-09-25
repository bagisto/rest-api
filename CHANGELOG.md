# CHANGELOG

This changelog consists of the bug & security fixes and new features being included in the releases listed below.

## **v2.2.1 (25th of September 2024)** - *Release*

* #372 [Fixed] - Duplicate routes fixing.

* Fixed events argument.

## **v2.1.1 (25th of September 2024)** - *Release*

* #372 [Fixed] - Duplicate routes fixing.

* Fixed events argument.

## **v2.2.0 (3rd of September 2024)** - *Release*

* #362 [Enhancement] - On the Shop API -> Theme API -> Please update the name of the API -> Get Theme Customization by id.

* #349 [Fixed] - wrong parameter raise error with customer on login listener.

* #347 [fixed] - Email verification is not sent while registering a new customer through (REST API) /api/v1/customer/register.

* #352 [fixed] - On the Admin API -> Categories API -> Mass Delete Categories -> while hitting the API getting exception.

* #353 [fixed] - On the admin API -> Please handle the 500 Internal server error on API on various cases.

* #354 [fixed] - On the admin API -> Store the customer -> getting internal server error on hitting the API.

* #355 [fixed] - On the admin API -> Update customer -> getting internal server error on hitting the API.

* #358 [fixed] - On the admin API -> Sales Reporting API -> getting internal server error.

* #360 [fixed] - On the Shop API -> Wishlists API - Get Customer Wishlist -> product details are showing null of the wishlist products.

* #363 [fixed] - On the Shop API -> Products API -> unable to get the product data.

* #367 [fixed] - On the Shop API -> Cart API -> Add Product to add to cart API -> if we give the different id on request data then also product going to add to cart.

* #368 [fixed] - On the Shop API -> Cart -> Update Cart Item API -> Giving invalid cart id but the response is not showing accordingly.[not found].

* #369 [fixed] - On the Shop API -> Cart API -> Delete all items from cart API -> Please update the response message.

* #370 [fixed] - On the Shop API -> Cart API -> move cart item to customer wishlist API -> on giving wrong cart item id the response message not showing correct.

* #371 [fixed] - On the Shop API -> Cart API -> move cart item to customer wishlist API -> please update the message.

## **v2.1.0 (10th of July 2024)** - *Release*

* #268 [enhancement] - Add decimal option for currency create or update api in the request body.

* #291 [fixed] - Getting "Internal Server Error" when update the sitemap.

* #339 [enhancement] - Please create an API for Newsletter subscription.

* #262 [fixed] - Add password validation when create or update new user.

* #263 [fixed] - If type "text" is selected then number validation is not adding while creating attribute.

* #264 [fixed] - Getting mail in both options for customer notified field.

* #265 [fixed] - Getting email_sent = null in response when generate new invoice.

* #266 [fixed] - Getting email_sent = null in response and receive 3 times shipment email when generate new shipment.

* #267 [fixed] - Getting email_sent = null in response and receive 2 times refund email when generate new refund.

* #269 [fixed] - Getting 2 as decimal value when admin create new currency.

* #270 [fixed] - Getting "Internal server error" if trying to delete the CMS page with invalid id.

* #271 [fixed] - Getting "Internal Server Error" when try to store exchange rate with invalid target currency.

* #272 [fixed] - Not getting updated response after update the CMS page.

* #273 [Fixed] - Getting "Internal server error" and mention 2 times category id parameter while getting product list form the shop.

* #278 [Fixed] - Store and Admin|| Need email, postcode and phone number validation while adding new address.

* #279 [Fixed] - Need to improve the response message when order is cancelled by customer.

* #287 [Fixed] - Need to improve the response message when store new catalog rule.

* #288 [Fixed] - Getting "Internal Server Error" when update catalog price rule.

* #292 [Fixed] - Getting "Internal Server Error" when update the theme.

* #293 [Fixed] - Getting "Internal Server Error" when delete unavailable theme.

* #295 [Fixed] - Need email validation while store or update new customer.

* #296 [Fixed] - Not receiving the email by customer notify api.

* #297 [Fixed] - Not getting correct warning message in response if update inventory source with invalid phone number.

* #298 [Fixed] - Getting exception from admin end when admin edit the newly store channel by api.

* #299 [Fixed] - Getting error when trying to update the channel.

* #300 [Fixed] - Getting "Internal Server Error" when update configurable, downloadable, bundle and grouped product.

* #301 [Fixed] - Getting "Internal Server Error" when update simple and virtual products.

* #340 [fixed] - ON the Store API -> Address create/Update API, need email validation.

* #336 [fixed] - while mass delete category API with invalid id getting unwanted message.

## **v2.0.0 (8th of March 2024)** - *Release*

* #108 [enhancement] - Need to add an api for mass update in customer api.

* #109 [enhancement] - Need to be add a create review api also here like others api's

* #101 [fixed] - When we create new product then shows an error, also status shows 500 internal server error 

* #102 [fixed] - When we update product using post method then shows an error, also status shows 500 internal server error 

* #103 [fixed] - Need to remove dd($data); from code.

* #104 [fixed] - When we update product using post method then shows an error, also status shows 500 internal server error, after solved these error but not update some fields

* #106 [fixed] - Should be shown proper msg, when we add a non existing prod. id or deleted from DB so after that when we get data then here should be shown a page not found. 

* #107 [fixed] - When we create a customer using customer create api side so here should be shown a validation message for phone number parameter field and also should be send an email.

* #110 [fixed] - In Customer reviews -> mass destroy api should be removed dd from code.

* #111 [fixed] - In Customer reviews -> mass update api, reviews status not updated properly on admin panel 

* #112 [fixed] - In Customer Review -> update review api, here shows a successfully updated message but not updated .

* #113 [fixed] - In Attribute Families -> Create attribute family api, created successfully but on admin panel view this attribute family so here not showing main and right column details

* #115 [fixed] - When we create new catalog rule then shows an error, also status shows 500 internal server error 

* #116 [fixed] - When we create new cart rule then shows an error, also status shows 500 internal server error

* #118 [fixed] - When we using customer api of register of customer then shows an error

* #119 [fixed] - When we using customer api of forgot-password api then shows an error

* #120 [fixed] - When we using product get api of customer api then shows an error

* #121 [fixed] - When using the iswishlisted product api in customer documentation then shows an error

* #122 [fixed] - When using the reviews product api in customer documentation then shows an error

* #123 [fixed] - When using the wishlist api of customer api then shows an error

* #124 [fixed] - When using the wishlist -> move to cart api of customer api then shows an error 

* #125 [fixed] - When we delete address from api side then hit again or delete non-exist address id so here shows an error instead of shows a proper warning message

* #128 [fixed] - In admin api: Attribute and attribute families api should not be update code and type field data

* #129 [fixed] - In Admin api: Categories updated but not updating here shows same warning message regarding fields

* #130 [fixed] - In Admin api: Note added api not working

* #131 [fixed] - In Admin api: Invoice create api not working fine

* #132 [fixed] - In Admin api: Shipments create api not working fine

* #133 [fixed] - In Admin api: Refunds create api not working fine 

* #134 [fixed] - In Admin api: Locales create api should be add a direction field or parameter while create locale time

* #135 [fixed] - In Admin api: When currencies update time here code validation not working like create currencies time add only 3 characters code limit 
 
* #136 [fixed] - In Admin api: Exchange Rates api not working properly shows an exception

* #137 [fixed] - In Admin api: Create and Update Inventory source api not added country parameter using postman api 

* #138 [fixed] - In Admin api: Roles api created here desc. field should be required like admin panel also permission details not showing when we create roles from postman side

* #139 [fixed] - In Customer api: Profile update api need to add a validation in first and last name field like admin panel

* #140 [fixed] - Cart and Checkout api's, should be worked without login any customer (Guest user) also, at this moment guest user not add prod. in cart and also checkout using api

* #142 [fixed] - When we using the inventory update api then inventory not updated

* #143 [fixed] - Should be shown a proper message for deleted id or non-exist id, here at this moment showing like this message

* #144 [fixed] - When we create new categories from api side then not created new category

* #145 [fixed] - In Admin API: Locale update api is not working properly

* #147 [fixed] - Cart and Catalog rule update api: In Parameter (sort_order) is not updated in get details after update successful 

* #154 [fixed] - Customer API -> Cancel order Api not working properly

* #157 [fixed] - Customer API -> Addresses Api not working properly

* #202 [fixed] - When we add this rest api then shows an error in installer time

* #205 [fixed] - When we create new product then received data shows a null value in sku param
