<?php
/**
 * PHP Array for English words
 */
class EN_US_WORDLIST_REGEX {
	function getBadWords() {
		$badwords = array();
		include(__DIR__ . DIRECTORY_SEPARATOR . 'en.wordlist-regex.php');
		array_push($badwords,
				'abortion',
				'anus',
				'beastiality',
				'bestiality',
				'bewb',
				'blow',
				'blumpkin',
				'cawk',
				'choad',
				'cooter',
				'cornhole',
				'dong',
				'douche',
				'fart',
				'foreskin',
				'gangbang',
				'gook',
				'hell',
				'honkey',
				'humping',
				'jiz',
				'labia',
				'nutsack',
				'pen1s',
				'poon',
				'punani',
				'queef',
				'quim',
				'rectal',
				'rectum',
				'rimjob',
				'spick',
				'spoo',
				'spooge',
				'taint',
				'titty',
				'vag',
				'whore'
		);
		return $badwords;
	}
}