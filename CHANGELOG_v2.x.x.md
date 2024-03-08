# CHANGELOG for v2.x.x

This changelog consists of the bug & security fixes and new features being included in the releases listed below.

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
