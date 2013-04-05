<?php

/**
 * Flickr class
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Flickr {


	/**
	 * Flickr API URL endpoint
	 */
	protected $ApiEndpoint = 'http://api.flickr.com/services/rest/';


	/**
	 * Generate image URL
	 *
	 * @param	string [$farmId]
	 * @param	string [$serverId]
	 * @param	string [$imgId]
	 * @param	string [$secret]
	 * @param	string [$size]
	 * @return	string
	 */
	public function url($farmId, $serverId, $imgId, $secret, $size) {

		return sprintf('//farm%s.staticflickr.com/%s/%s_%s_%s.jpg', $farmId, $serverId, $imgId, $secret, $size);

	}


	/**
	 * Read photos from a set
	 *
	 * @param	string [$setId] The ID of the set, as a string
	 * @return	mixed
	 */
	public function readSet($setId) {

		return Cache::get('flickr_set_'.$setId);

	}


	/**
	 * Update cache of set photos
	 *
	 * @param	string [$setId] The ID of the set, as a string
	 * @return	void
	 */
	public function updateSet($setId) {

		// Define parameters
		$urlParameters = array(
			'method' => 'flickr.photosets.getPhotos',
			'api_key' => Config::value('flickr')->api_key,
			'photoset_id' => $setId,
			'extras' => 'date_taken',
			'privacy_filter' => '1',
			'per_page' => '100',
			'media' => 'photos',
			'format' => 'json',
			'nojsoncallback' => '1'
		);

		// Define sizes to return
		$sizes = array(
			'small' => 'n',
			'medium' => 'z',
			'large' => 'b'
		);

		// Build URL
		$url = $this->ApiEndpoint.'?'.http_build_query($urlParameters);

		$response = json_decode(file_get_contents($url));

		$photos = array();
		foreach ($response->photoset->photo as $photo) {

			// Generate URLs
			foreach ($sizes as $key => $value) {
				$urls[$key] = $this->url($photo->farm, $photo->server, $photo->id, $photo->secret, $value);
			}

			$photos[] = (object) array(
				'title' => $photo->title,
				'taken' => strtotime($photo->datetaken),
				'url' => (object) $urls
			);

		}

		// Add to cahce
		Cache::set('flickr_set_'.$setId, $photos, 0);

	}


}