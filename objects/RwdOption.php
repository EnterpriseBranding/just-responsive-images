<?php
namespace jri\objects;

/**
 * Class RwdSize
 *
 * @package jri\components
 */
class RwdOption {
	/**
	 * Option key
	 *
	 * @var string
	 */
	public $key;

	/**
	 * Current option image size
	 *
	 * @var ImageSize
	 */
	public $size;

	/**
	 * Picture tag media query
	 *
	 * @var string|null
	 */
	public $picture;

	/**
	 * Background media wrappers
	 *
	 * @var string|null
	 */
	public $bg;

	/**
	 * Img tag `srcset` attribute part
	 *
	 * @var string|null
	 */
	public $srcset;

	/**
	 * Img tag `sizes` attribute part
	 *
	 * @var string|null
	 */
	public $sizes;

	/**
	 * RwdOption constructor.
	 *
	 * @param string $key Option key.
	 * @param array  $params Parameters.
	 */
	public function __construct( $key, $params ) {
		$params = array_merge( array(
			'picture' => null,
			'bg'      => null,
			'srcset'  => null,
			'sizes'   => null,
		), $params );
		if ( !isset($params[0]) ) $params[0] = '';

		$this->key     = $key;
		$this->size    = new ImageSize( $key, $params[0] );
		$this->picture = $params['picture'];
		$this->bg      = $params['bg'];
		$this->srcset  = $params['srcset'];
		$this->sizes   = $params['sizes'];

		// save to global.
		global $rwd_image_options;
		$rwd_image_options[ $key ] = $this;
	}
}