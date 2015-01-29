<?php

class DillerTablosuKayitlari extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('language')->truncate();

        DB::table('language')->insert(array(
            array(
                'name'			=>	'English',
                'prefix'		=>	'en',
                'created_at'	=>	new DateTime,
                'updated_at'	=>	new DateTime,
            ),
            array(
                'name'			=>	'Türkçe',
                'prefix'		=>	'tr'
                'created_at'	=>	new DateTime,
                'updated_at'	=>	new DateTime,
            )
        ));
    }
}
