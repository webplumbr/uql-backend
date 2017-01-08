<?php

class ApiTest extends TestCase
{
    protected $baseUrl = '';

    public function testLibraryDetails()
    {
        $library = new stdClass();
        $library->id   = '101202';
        $library->code = 'ARC100';
        $library->name = 'Architecture/Music Library';
        $library->abbr = 'Arch Music';
        $library->url  = 'http://uql-backend.localhost/locations/architecturemusic-library';

        $this->get('/api/library/101202')->seeJsonEquals((array) $library);
    }

    /**
     * There is an issue with Laravel test case not accepting custom http headers
     * Hence this negation test
     *
     */
    public function testLibrarySaveUnauthorized()
    {
        $randomName = sprintf('%s %s library', str_random(12), str_random(12));

        $data = [
            'id'   => rand(10000, 1000000),
            'code' => str_random(3). rand(100, 999),
            'name' => $randomName,
            'abbr' => substr($randomName, 0, 12),
            'url'  => sprintf('http://%s/locations/%s', getenv('HOSTNAME'), str_slug(substr($randomName, 0, 12)))
        ];

        $this->assertEquals(401, $this->post('/api/library', $data)->response->getStatusCode());
    }

    public function testFindSmallestLeaf()
    {
        $tree = urlencode('{"root":1,"left":{"root":7,"left":{"root":2,"left":{"root":4},"right":{"root":3}},"right":{"root":6}},"right":{"root":5,"left":{"root":9}}}');

        $this->assertEquals(3, $this->get('/api/findSmallestLeaf?tree='. $tree)->response->getContent());
    }
}
