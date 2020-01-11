<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $offer=new Offer();
        $offer->title = 'new webpage';
        $offer->user = 1;
        $offer->description = 'help me';
        $offer->deadline = '2020-01-20 13:33:44';
        $offer->maxSalary = 3000;
        $offer->save();

    }
}
