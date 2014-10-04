<?php

/**
 * This file is part of Bootstrap CMS by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 */

namespace GrahamCampbell\BootstrapCMS\Seeds;

use Carbon\Carbon;
use GrahamCampbell\Binput\Facades\Binput;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * This is the pages table seeder class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Bootstrap-CMS/blob/master/LICENSE.md> AGPL 3.0
 */
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        $home = array(
            'title' => 'Welcome',
            'nav_title' => 'Home',
            'slug'  => 'home',
            'body'  => Binput::clean(Markdown::render(File::get(dirname(__FILE__).'/page-home.md')), true, false),
            'show_title' => false,
            'icon'       => 'home',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );

        DB::table('pages')->insert($home);

        $contact = array(
            'title' => 'Contact Us',
            'nav_title' => 'Contact',
            'slug'  => 'contact',
            'body'  => Binput::clean(Markdown::render(File::get(dirname(__FILE__).'/page-contact.md')), true, false),
            'user_id'    => 1,
            'icon'       => 'envelope',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );

        DB::table('pages')->insert($contact);

        $about = array(
            'title' => 'About Us',
            'nav_title' => 'About',
            'slug'  => 'about',
            'body'  => Binput::clean('<div class="row"><div class="col-lg-8">'
                .Markdown::render(File::get(dirname(__FILE__).'/page-about.md')).'</div></div>', true, false),
            'user_id'    => 1,
            'icon'       => 'info-circle',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );

        DB::table('pages')->insert($about);
    }
}
