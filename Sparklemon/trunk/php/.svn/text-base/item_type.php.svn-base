<?php
/*
** returns item type in a variable
*/

function get_item_type($i_type,$i_subtype)
{
	switch ($i_type) {
		case 0:
		echo "Graphic";
		switch ($i_subtype) {
			case 0:
			$show_subtype="Sprite";
			break;
			case 1:
			$show_subtype="Background";
			break;
			case 2:
			$show_subtype="User Interface";
			break;
			case 3:
			$show_subtype="Other";
			break;
		}
		break;
		
		case 1:
		echo "Sound/Music";
		switch ($i_subtype) {
			case 0:
			$show_subtype="Background";
			break;
		}
		break;
		
		case 2:
		echo "Script/Plugin";
		switch ($i_subtype) {
			case 0:
			$show_subtype="C";
			break;
			case 1:
			$show_subtype="Java";
			break;
			case 2:
			$show_subtype="GML";
			break;
			case 3:
			$show_subtype="Lua";
			break;
			case 4:
			$show_subtype="Python";
			break;
		}
		break;
		
		case 3:
		echo "Engine";
		break;
	}
	return $show_subtype;
}

?>