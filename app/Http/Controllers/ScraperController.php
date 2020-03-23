<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\client as GuzzleClient;

class ScraperController extends Controller {

	private $payload;

	public function __construct() {
		$this->scrapingTime();
	}

	public function getDataStudents() {
		return $this->payload;
	}

	private function scrapingTime() {
		$goutteClient = new Client();
		$guzzleClient = new GuzzleClient(array('timeout' => 30, 'verify' => false));
		$goutteClient->setClient($guzzleClient);
		$crawler = $goutteClient->request('GET', 'https://www.boolean.careers/carriere');
		$data[] = $crawler->filter('.boolean__career__salary__body .boolean__career__student')->each(function ($node) {
			$studentData = [
				'name' => preg_replace('#\s*\(.+\)\s*#U', '', $node->filter('h3')->text()),
				'age' => intval(preg_replace('/[^0-9]/', '', $node->filter('h3 span.age')->text())),
				'img' => $node->filter('img')->attr('src'),
				'linkedin_url' => $node->filter('a')->attr('href'),
				'company' => trim(explode('da', explode('come', $node->filter('span')->last()->text())[0])[1]),
				'role' => trim(explode('come', $node->filter('span')->last()->text())[1]),
				'gender' => (strtolower(explode(' ', $node->filter('span')->last()->text())[0])) == ('assunto') ? 'M' : 'F',
				'description' => $node->filter('p')->text(),
				'slug' => str_replace(' ', '-', strtolower(preg_replace('#\s*\(.+\)\s*#U', '', $node->filter('h3')->text())))
			];
			return $studentData;
		});
		return $this->payload = $data;
	} 
}
