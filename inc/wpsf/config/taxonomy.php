<?php
/*-------------------------------------------------------------------------------------------------
 - This file is part of the WPSF package.                                                         -
 - This package is Open Source Software. For the full copyright and license                       -
 - information, please view the LICENSE file which was distributed with this                      -
 - source code.                                                                                   -
 -                                                                                                -
 - @package    WPSF                                                                               -
 - @author     Varun Sridharan <varunsridharan23@gmail.com>                                       -
 -------------------------------------------------------------------------------------------------*/

/**
 * Created by PhpStorm.
 * User: varun
 * Date: 16-01-2018
 * Time: 01:53 PM
 */

new WPSFramework_Taxonomy(
	array(
		array(
			'id'       => 'novel_cat_options',
			'taxonomy' => 'novel',
			// category, post_tag or your custom taxonomy name
			'fields'   => array(
				array(
					'id'    => 'novel_cover_image',
					'type'  => 'image',
					'title' => 'Cover Image',
				),
				array(
					'id'             => 'novel_status',
					'type'           => 'select',
					'title'          => 'Novel Status Select',
					'options'        => array(
						'连载中' => '连载中',
						'wanjie'  => '完结',
						'tinggen' => '停更',
					),
					'default_option' => 'Select your novel status',
				),
			),
		),

		array(
			'id'       => '_custom_taxonomy_options',
			'taxonomy' => 'post_tag',
			// category, post_tag or your custom taxonomy name
			'fields'   => array(
				array(
					'id'    => 'section_1_text',
					'type'  => 'text',
					'title' => 'Text Field',
				),
			),
		),
	)
);
