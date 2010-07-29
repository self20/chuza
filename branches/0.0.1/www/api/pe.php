<?
// The Meneame source code is Free Software, Copyright (C) 2005-2009 by
// Ricardo Galli <gallir at gmail dot com> and Menéame Comunicacions S.L.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.

// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.

// It's licensed under the AFFERO GENERAL PUBLIC LICENSE unless stated otherwise.
// You can get copies of the licenses here:
// 		http://www.affero.org/oagpl.html
// AFFERO GENERAL PUBLIC LICENSE is also included in the file called "COPYING".

include('../config.php');
include(mnminclude.'html1.php');

meta_get_current();


$page_size = 15;
$page = get_current_page();
$offset=($page-1)*$page_size;
$globals['ads'] = true;

$cat=$_REQUEST['category'];



do_footer_menu();
do_footer();

function print_index_tabs($option=-1) {
	global $globals, $db, $current_user;

	$toggler = get_toggler_plusminus('topcatlist', $_REQUEST['category']);
	$active = array();
	$toggle_active = array();
	if ($option >= 0) {
		$active[$option] = 'class="selected"';
		$toggle_active[$option] = &$toggler;
	}

	echo '<ul class="subheader">'."\n";
	if ($current_user->has_personal) {
		echo '<li '.$active[7].'><span><a href="'.$globals['base_url'].'">'._('personal'). '</a>'.$toggle_active[7].'</span></li>'."\n";
	}
	echo '<li '.$active[0].'><span><a href="'.$globals['base_url'].$globals['meta_skip'].'">'._('todas'). '</a>'.$toggle_active[0].'</span></li>'."\n";
	// Do metacategories list
	$metas = $db->get_results("SELECT SQL_CACHE category_id, category_name, category_uri FROM categories WHERE category_parent = 0 ORDER BY category_id ASC");
	if ($metas) {
		foreach ($metas as $meta) {
			if ($meta->category_id == $globals['meta_current']) {
				$active_meta = 'class="selected"';
				$globals['meta_current_name'] = $meta->category_name;
				$toggle = &$toggler;
			} else {
				$active_meta = '';
				$toggle = '';
			}
			echo '<li '.$active_meta.'><span><a href="'.$globals['base_url'].'?meta='.$meta->category_uri.'">'.$meta->category_name. '</a>'.$toggle.'</span></li>'."\n";
		}
	}

	if ($current_user->user_id > 0) {
		echo '<li '.$active[1].'><span><a href="'.$globals['base_url'].'?meta=_friends">'._('amigos'). '</a>'.$toggle_active[1].'</span></li>'."\n";
	}

	// Print RSS teasers
	switch ($option) {
		case 0: // All, published
			echo '<li class="icon"><a href="'.$globals['base_url'].'rss2.php" rel="rss"><img src="'.$globals['base_static'].'img/common/feed-icon-001.png" width="18" height="18" alt="rss2"/></a></li>';
			break;
		case 7: // Personalised, published
			echo '<li class="icon"><a href="'.$globals['base_url'].'rss2.php?personal='.$current_user->user_id.'" rel="rss" title="'._('categorías personalizadas').'"><img src="'.$globals['base_static'].'img/common/feed-icon-001.png" width="18" height="18" alt="rss2"/></a></li>';
			break;
		default:
			echo '<li class="icon"><a href="'.$globals['base_url'].'rss2.php?meta='.$globals['meta_current'].'" rel="rss"><img src="'.$globals['base_static'].'img/common/feed-icon-001.png" width="18" height="18" alt="rss2"/></a></li>';
	}

	echo '</ul>'."\n";
}

?>
