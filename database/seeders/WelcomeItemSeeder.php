<?php

namespace Database\Seeders;

use App\Models\WelcomeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WelcomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = new WelcomeItem;
        $items->title = 'Welcome to TripSummit';
        $items->description = 'At TripSummit, our mission is to turn travel dreams into reality by providing personalized and memorable experiences. We leverage our expertise and trusted partners to ensure every trip is seamless and enjoyable.
                               We believe travel fosters personal growth and cultural understanding. Our goal is to help clients explore new destinations and connect with diverse cultures. We promote sustainable travel to positively impact communities and preserve our planet’s beauty..';

        $items->button_text = 'Learn More';
        $items->button_link = '#';
        $items->photo = 'about-1.jpg';
        $items->video = 'S4DI3Bve_bQ';
        $items->status = 'show';
        $items->save();
    }
}
