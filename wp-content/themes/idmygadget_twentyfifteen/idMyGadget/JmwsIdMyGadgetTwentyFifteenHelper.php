<?php
/**
 * Helper functions added to the default WordPress theme twentyfifteen.
 * This code has been added specifically to support device detction.
 *
 * @author Tom W. Hartung, using the default WordPress theme twentyfifteen as a starting point
 * @package Jmws
 * @subpackage idmygadget_twentyfifteen
 * @since idmygadget_twentyfifteen 1.0
 */

class JmwsIdMyGadgetTwentyFifteenHelper
{
	/**
	 * Boolean indicating whether the phone header nav should be in the page on the current device
	 */
	public $phoneHeaderNavIn2015Page = FALSE;
	/**
	 * Boolean indicating whether the phone header nav should be in the sidebar on the current device
	 */
	public $phoneHeaderNavIn2015Sidebar = FALSE;
	/**
	 * Boolean indicating whether the phone footer nav should be in the page on the current device
	 */
	public $phoneFooterNavIn2015Page = FALSE;
	/**
	 * Boolean indicating whether the phone footer nav should be in the sidebar on the current device
	 */
	public $phoneFooterNavIn2015Sidebar = FALSE;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
	}
	/**
	 * Set variables so the header knows what type of navigation to use, if any
	 */
	public function setPhoneHeaderFooterNavVariables()
	{
		global $idmg_nav_in_page_or_sidebar_index;
		global $idmg_nav_in_page_or_sidebar_string;
		global $jmwsIdMyGadget;
	
		if( isset($jmwsIdMyGadget) )
		{
			$this->phoneHeaderNavIn2015Page = FALSE;
			$this->phoneHeaderNavIn2015Sidebar = FALSE;
			$this->phoneFooterNavIn2015Page = FALSE;
			$this->phoneFooterNavIn2015Sidebar = FALSE;
			if( $jmwsIdMyGadget->phoneHeaderNavThisDevice || $jmwsIdMyGadget->phoneFooterNavThisDevice )
			{
				if ( $jmwsIdMyGadget->isPhone() )
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_phones' );
				}
				else if ( $jmwsIdMyGadget->isTablet() )
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_tablets' );
				}
				else
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_desktops' );
				}
				$idmg_nav_in_page_or_sidebar_string =
					JmwsIdMyGadgetWordpress::$pageOrSidebar2015Options[$idmg_nav_in_page_or_sidebar_index];
				if( $jmwsIdMyGadget->phoneHeaderNavThisDevice && has_nav_menu('phone-header-nav') )
				{
					$this->phoneHeaderNavIn2015Page =
						$idmg_nav_in_page_or_sidebar_string == 'Page' ? TRUE : FALSE;
					$this->phoneHeaderNavIn2015Sidebar =
						$idmg_nav_in_page_or_sidebar_string == 'Sidebar' ? TRUE : FALSE;
				}
				if( $jmwsIdMyGadget->phoneFooterNavThisDevice && has_nav_menu('phone-footer-nav') )
				{
					$this->phoneFooterNavIn2015Page =
						$idmg_nav_in_page_or_sidebar_string == 'Page' ? TRUE : FALSE;
					$this->phoneFooterNavIn2015Sidebar =
						$idmg_nav_in_page_or_sidebar_string == 'Sidebar' ? TRUE : FALSE;
				}
			}
		}
	}
}
