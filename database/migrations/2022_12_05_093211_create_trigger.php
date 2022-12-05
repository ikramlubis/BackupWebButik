<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared('CREATE TRIGGER nonvalue_update_categories BEFORE UPDATE ON log_categories
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_orders BEFORE UPDATE ON log_orders
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_payments BEFORE UPDATE ON log_payments
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_permissions BEFORE UPDATE ON log_permissions
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_products BEFORE UPDATE ON log_products
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_reviews BEFORE UPDATE ON log_reviews
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_shipments BEFORE UPDATE ON log_shipments
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_slides BEFORE UPDATE ON log_slides
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_tags BEFORE UPDATE ON log_tags
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER nonvalue_update_users BEFORE UPDATE ON log_users
        FOR EACH ROW BEGIN
       SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa update";
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_categories AFTER INSERT ON categories
        FOR EACH ROW BEGIN
       INSERT INTO log_categories (description, time, name, slug, cover, category_id) VALUES("INSERT",now(), new.name, new.slug, new.cover, new.category_id);
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_orders AFTER INSERT ON orders
        FOR EACH ROW BEGIN
       INSERT INTO log_orders (description, time, user_id, code, status, payment_status, payment_token, payment_url, base_total_price, tax_amount, tax_percent, discount_amount, discount_percent, shipping_cost, grand_total, note, customer_first_name, customer_last_name, customer_address1, customer_address2, customer_phone, customer_email, customer_city_id, customer_province_id, customer_postcode, shipping_courier, shipping_service_name) VALUES("INSERT",now(), new.user_id, new.code, new.status, new.payment_status, new.payment_token, new.payment_url, new.base_total_price, new.tax_amount, new.tax_percent, new.discount_amount, new.discount_percent, new.shipping_cost, new.grand_total, new.note, new.customer_first_name, new.customer_last_name, new.customer_address1, new.customer_address2, new.customer_phone, new.customer_email, new.customer_city_id, new.customer_province_id, new.customer_postcode, new.shipping_courier, new.shipping_service_name);
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_payments AFTER INSERT ON payments
        FOR EACH ROW BEGIN
       INSERT INTO log_payments (description, time, order_id, number, amount, method, status, token, payloads, payment_type, va_number, vendor_name, biller_code, bill_key) VALUES("INSERT",now(), new.order_id, new.number, new.amount, new.method, new.status, new.token, new.payloads, new.payment_type, new.va_number, new.vendor_name, new.biller_code, new.bill_key);
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_permissions AFTER INSERT ON permissions
        FOR EACH ROW BEGIN
       INSERT INTO log_permissions (description, time, title) VALUES("INSERT",now(), new.title);
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_products AFTER INSERT ON products
        FOR EACH ROW BEGIN
       INSERT INTO log_products (descriptiondata, time, name, slug, price, description, details, weight, quantity, status, review_able, category_id) VALUES("INSERT",now(), new.name, new.slug, new.price, new.description, new.details, new.weight, new.quantity, new.status, new.review_able, new.category_id );
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_reviews AFTER INSERT ON reviews
        FOR EACH ROW BEGIN
       INSERT INTO log_reviews (description, time, user_id, product_id, content, status, rating, ip_address) VALUES("INSERT",now(), new.user_id, new.product_id, new.content, new.status, new.rating, new.ip_address);
       END');

       DB::unprepared('CREATE TRIGGER trigger_add_shipments AFTER INSERT ON shipments
        FOR EACH ROW BEGIN
       INSERT INTO log_shipments (description, time, user_id, order_id, track_number, status, total_qty, total_weight ,first_name, last_name, address1, address2, phone, email, city_id, province_id, postcode) VALUES("INSERT",now(),new.user_id, new.order_id, new.track_number, new.status, new.total_qty, new.total_weight ,new.first_name, new.last_name, new.address1, new.address2, new.phone, new.email, new.city_id, new.province_id, new.postcode);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_add_slides` AFTER INSERT ON `slides`
        FOR EACH ROW BEGIN
       INSERT INTO log_slides (description, time, title, url, position, body, cover) VALUES("INSERT",now(),new.title, new.url, new.position, new.body, new.cover);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_add_tags` AFTER INSERT ON `tags`
        FOR EACH ROW BEGIN
       INSERT INTO log_tags (description, time, name, slug) VALUES("INSERT",now(),new.name,new.slug);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_add_users` AFTER INSERT ON `users`
        FOR EACH ROW BEGIN
       INSERT INTO log_users (description, time, username, first_name, last_name, email, phone, address1 ,address2, province_id, city_id, postcode, password) VALUES("INSERT",now(),new.username,new.first_name,new.last_name,new.email,new.phone,new.address1,new.address2,new.province_id,new.city_id,new.postcode,new.password);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_categories` AFTER DELETE ON `categories`
        FOR EACH ROW BEGIN
       INSERT INTO log_categories (description, time, name, slug, cover, category_id) VALUES("DELETE",now(), old.name, old.slug, old.cover, old.category_id);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_orders` AFTER DELETE ON `orders`
        FOR EACH ROW BEGIN
       INSERT INTO log_orders (description, time, user_id, code, status, payment_status, payment_token, payment_url, base_total_price, tax_amount, tax_percent, discount_amount, discount_percent, shipping_cost, grand_total, note, customer_first_name, customer_last_name, customer_address1, customer_address2, customer_phone, customer_email, customer_city_id, customer_province_id, customer_postcode, shipping_courier, shipping_service_name) VALUES("DELETE",now(), old.user_id, old.code, old.status, old.payment_status, old.payment_token, old.payment_url, old.base_total_price, old.tax_amount, old.tax_percent, old.discount_amount, old.discount_percent, old.shipping_cost, old.grand_total, old.note, old.customer_first_name, old.customer_last_name, old.customer_address1, old.customer_address2, old.customer_phone, old.customer_email, old.customer_city_id, old.customer_province_id, old.customer_postcode, old.shipping_courier, old.shipping_service_name);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_payments` AFTER DELETE ON `payments`
        FOR EACH ROW BEGIN
       INSERT INTO log_payments (description, time, order_id, number, amount, method, status, token, payloads, payment_type, va_number, vendor_name, biller_code, bill_key) VALUES("DELETE",now(), old.order_id, old.number, old.amount, old.method, old.status, old.token, old.payloads, old.payment_type, old.va_number, old.vendor_name, old.biller_code, old.bill_key);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_permissions` AFTER DELETE ON `permissions`
        FOR EACH ROW BEGIN
       INSERT INTO log_permissions (description, time, title) VALUES("DELETE",now(), old.title);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_products` AFTER DELETE ON `products`
        FOR EACH ROW BEGIN
       INSERT INTO log_products (descriptiondata, time, name, slug, price, description, details, weight, quantity, status, review_able, category_id) VALUES("DELETE",now(), old.name, old.slug, old.price, old.description, old.details, old.weight, old.quantity, old.status, old.review_able, old.category_id );
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_reviews` AFTER DELETE ON `reviews`
        FOR EACH ROW BEGIN
       INSERT INTO log_reviews (description, time, user_id, product_id, content, status, rating, ip_address) VALUES("DELETE",now(), old.user_id, old.product_id, old.content, old.status, old.rating, old.ip_address);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_shipments` AFTER DELETE ON `shipments`
        FOR EACH ROW BEGIN
       INSERT INTO log_shipments (description, time, user_id, order_id, track_number, status, total_qty, total_weight ,first_name, last_name, address1, address2, phone, email, city_id, province_id, postcode) VALUES("DELETE",now(),old.user_id, old.order_id, old.track_number, old.status, old.total_qty, old.total_weight ,old.first_name, old.last_name, old.address1, old.address2, old.phone, old.email, old.city_id, old.province_id, old.postcode);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_slides` AFTER DELETE ON `slides`
        FOR EACH ROW BEGIN
       INSERT INTO log_slides (description, time, title, url, position, body, cover) VALUES("DELETE",now(),old.title, old.url, old.position, old.body, old.cover);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_tags` AFTER DELETE ON `tags`
        FOR EACH ROW BEGIN
       INSERT INTO log_tags (description, time, name, slug) VALUES("DELETE",now(),old.name,old.slug);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_hapus_users` AFTER DELETE ON `users`
        FOR EACH ROW BEGIN
       INSERT INTO log_users (description, time, username, first_name, last_name, email, phone, address1 ,address2, province_id, city_id, postcode, password) VALUES("DELETE",now(),old.username,old.first_name,old.last_name,old.email,old.phone,old.address1,old.address2,old.province_id,old.city_id,old.postcode,old.password);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_categories` AFTER UPDATE ON `categories`
        FOR EACH ROW BEGIN
       INSERT INTO log_categories (description, time, name, slug, cover, category_id) VALUES("UPDATE",now(), new.name, new.slug, new.cover, new.category_id);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_orders` AFTER UPDATE ON `orders`
        FOR EACH ROW BEGIN
       INSERT INTO log_orders (description, time, user_id, code, status, payment_status, payment_token, payment_url, base_total_price, tax_amount, tax_percent, discount_amount, discount_percent, shipping_cost, grand_total, note, customer_first_name, customer_last_name, customer_address1, customer_address2, customer_phone, customer_email, customer_city_id, customer_province_id, customer_postcode, shipping_courier, shipping_service_name) VALUES("UPDATE",now(), new.user_id, new.code, new.status, new.payment_status, new.payment_token, new.payment_url, new.base_total_price, new.tax_amount, new.tax_percent, new.discount_amount, new.discount_percent, new.shipping_cost, new.grand_total, new.note, new.customer_first_name, new.customer_last_name, new.customer_address1, new.customer_address2, new.customer_phone, new.customer_email, new.customer_city_id, new.customer_province_id, new.customer_postcode, new.shipping_courier, new.shipping_service_name);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_payments` AFTER UPDATE ON `payments`
        FOR EACH ROW BEGIN
       INSERT INTO log_payments (description, time, order_id, number, amount, method, status, token, payloads, payment_type, va_number, vendor_name, biller_code, bill_key) VALUES("UPDATE",now(), new.order_id, new.number, new.amount, new.method, new.status, new.token, new.payloads, new.payment_type, new.va_number, new.vendor_name, new.biller_code, new.bill_key);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_permissions` AFTER UPDATE ON `permissions`
        FOR EACH ROW BEGIN
       INSERT INTO log_permissions (description, time, title) VALUES("UPDATE",now(), new.title);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_products` AFTER UPDATE ON `products`
        FOR EACH ROW BEGIN
       INSERT INTO log_products (descriptiondata, time, name, slug, price, description, details, weight, quantity, status, review_able, category_id) VALUES("UPDATE",now(), new.name, new.slug, new.price, new.description, new.details, new.weight, new.quantity, new.status, new.review_able, new.category_id );
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_reviews` AFTER UPDATE ON `reviews`
        FOR EACH ROW BEGIN
       INSERT INTO log_reviews (description, time, user_id, product_id, content, status, rating, ip_address) VALUES("UPDATE",now(), new.user_id, new.product_id, new.content, new.status, new.rating, new.ip_address);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_shipments` AFTER UPDATE ON `shipments`
        FOR EACH ROW BEGIN
       INSERT INTO log_shipments (description, time, user_id, order_id, track_number, status, total_qty, total_weight ,first_name, last_name, address1, address2, phone, email, city_id, province_id, postcode) VALUES("UPDATE",now(),new.user_id, new.order_id, new.track_number, new.status, new.total_qty, new.total_weight ,new.first_name, new.last_name, new.address1, new.address2, new.phone, new.email, new.city_id, new.province_id, new.postcode);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_slides` AFTER UPDATE ON `slides`
        FOR EACH ROW BEGIN
       INSERT INTO log_slides (description, time, title, url, position, body, cover) VALUES("UPDATE",now(),new.title, new.url, new.position, new.body, new.cover);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_tags` AFTER UPDATE ON `tags`
        FOR EACH ROW BEGIN
       INSERT INTO log_tags (description, time, name, slug) VALUES("UPDATE",now(),new.name,new.slug);
       END');

       DB::unprepared('CREATE TRIGGER `trigger_ubah_users` AFTER UPDATE ON `users`
        FOR EACH ROW BEGIN
       INSERT INTO log_users (description, time, username, first_name, last_name, email, phone, address1 ,address2, province_id, city_id, postcode, password) VALUES("UPDATE",now(),new.username,new.first_name,new.last_name,new.email,new.phone,new.address1,new.address2,new.province_id,new.city_id,new.postcode,new.password);
       END');

       DB::unprepared('CREATE TRIGGER `nonvalue_delete_categories` BEFORE DELETE ON `log_categories`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_orders` BEFORE DELETE ON `log_orders`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_payments` BEFORE DELETE ON `log_payments`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_permissions` BEFORE DELETE ON `log_permissions`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_products` BEFORE DELETE ON `log_products`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_reviews` BEFORE DELETE ON `log_reviews`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_shipments` BEFORE DELETE ON `log_shipments`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_slides` BEFORE DELETE ON `log_slides`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_tags` BEFORE DELETE ON `log_tags`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');

        DB::unprepared('CREATE TRIGGER `nonvalue_delete_users` BEFORE DELETE ON `log_users`
        FOR EACH ROW BEGIN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Tidak bisa delete";
        END');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
