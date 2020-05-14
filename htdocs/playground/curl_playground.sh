# get
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI"

curl --request POST \
     "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI"
     
# endpoint Product
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Product"
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Product&sub=Fresh"
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Product&sub=Popular"
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Product&product_id=2"
curl "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Product&product_id=5"



# endpoint Vote
curl --request POST \
     "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Vote&product_id=2"

curl --request POST \
     "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Vote&user_id=2"

curl --request POST \
     "http://simplon-tp-product-hunt.loc/?controller=ProductHuntAPI&endpoint=Vote&user_id=2&product_id=1"