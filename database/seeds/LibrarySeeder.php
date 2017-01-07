<?php

use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getLibraries() as $library) {
            DB::table('library')->insert([
                'id'   => rand(10000, 100000),
                'code' => $library['code'],
                'name' => $library['name'],
                'abbr' => $library['abbr'],
                'url'  => sprintf('http://%s/locations/%s', getenv('HOSTNAME'), str_slug($library['name']))
            ]);
        }
    }

    protected function getLibraries()
    {
        return [
            ['code' => 'ARC100', 'name' => 'Architecture/Music Library', 'abbr' => 'Arch Music'],
            ['code' => 'HUM100', 'name' => 'Humanities Library', 'abbr' => 'Human'],
            ['code' => 'ENG100', 'name' => 'Engineering Library', 'abbr' => 'Engr'],
            ['code' => 'ART100', 'name' => 'Arts Library', 'abbr' => 'Arts'],
            ['code' => 'MHS100', 'name' => 'Medical Health Sciences Library', 'abbr' => 'Med Health Sci'],
            ['code' => 'MUL100', 'name' => 'Multimedia Studies Library', 'abbr' => 'Multimedia'],
        ];
    }
}
