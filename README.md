# wordpress custom language slug using acf with multilingiual plugin

hello wpCoder,

if you have use Multilanguage plugin for Bestwebsoft so you need this code because this plugin does not provide language based slug.

but i did that types of functionality using my custom code in page and post see below:

-> first you need to install Advanced Custom Field (ACF) Plugin

-> then you need to create group field in acf
   - you just create two field in acf label English Slug and Dutch Slug
   - name like en_slugs and de_slugs with type both type is Text
   - and show this fields in poty type post or page using condition in acf.
   - now you can go single page or single post and see there you can see created field metabox.
   - add slug in both then move to next step.
   
-> then you neet to get created acf field value using custom wordpress query which i make code please refer code.
