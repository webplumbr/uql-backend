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
                'id'   => $library['id'],
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
            ['code' => 'ARC100', 'id' => 101202, 'name' => 'Architecture/Music Library', 'abbr' => 'Arch Music'],
            ['code' => 'HUM100', 'id' => 201302, 'name' => 'Humanities Library', 'abbr' => 'Human'],
            ['code' => 'ENG100', 'id' => 301204, 'name' => 'Engineering Library', 'abbr' => 'Engr'],
            ['code' => 'ART100', 'id' => 401502, 'name' => 'Arts Library', 'abbr' => 'Arts'],
            ['code' => 'MHS100', 'id' => 501602, 'name' => 'Medical Health Sciences Library', 'abbr' => 'Med Health Sci'],
            ['code' => 'MUL100', 'id' => 601702, 'name' => 'Multimedia Studies Library', 'abbr' => 'Multimedia'],
        ];
    }
}
