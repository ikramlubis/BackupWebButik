<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW v_bestsellers AS
        select `tubes_website_butik`.`products`.`id` AS `id`,`tubes_website_butik`.`products`.`name` AS `nama`,`tubes_website_butik`.`products`.`price` AS `harga`,`tubes_website_butik`.`products`.`quantity` AS `jumlah`,`tubes_website_butik`.`products`.`sold` AS `terjual` from `tubes_website_butik`.`products` order by `tubes_website_butik`.`products`.`sold` desc limit 3');

        DB::unprepared('CREATE VIEW v_totalpenjualan AS
        select sum(`tubes_website_butik`.`products`.`sold`) AS `Barang_Terjual`,sum(`tubes_website_butik`.`products`.`sold` * `tubes_website_butik`.`products`.`price`) AS `Total_Penghasilan` from `tubes_website_butik`.`products`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
