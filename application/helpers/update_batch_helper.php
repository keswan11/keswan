<?php 
function update_batch($db, $table = '', $set = NULL, $index = NULL, $index_update_key = '') {
	if ($table === '' || is_null($set) || is_null($index) || !is_array($set)) {
		return FALSE;
	}

	$sql = 'UPDATE ' . $db->protect_identifiers($table) . ' SET ';

	$ids = $when = array();
	$cases = '';

//generate the WHEN statements from the set array
	foreach ($set as $key => $val) {
		$ids[] = $val[$index];

		foreach (array_keys($val) as $field) {
			if ($field != $index && $field != $index_update_key) {
				$when[$field][] = 'WHEN ' . $db->protect_identifiers($index) 
				. ' = ' . $db->escape($val[$index]) . ' THEN ' . $db->escape($val[$field]);
			} elseif ($field == $index) {
            //if index should also be updated use the new value specified by index_update_key
				$when[$field][] = 'WHEN ' . $db->protect_identifiers($index) 
				. ' = ' . $db->escape($val[$index]) . ' THEN ' . $db->escape($val[$index_update_key]);
			}
		}
	}

//generate the case statements with the keys and values from the when array
	foreach ($when as $k => $v) {
		$cases .= "\n" . $db->protect_identifiers($k) . ' = CASE ' . "\n";
		foreach ($v as $row) {
			$cases .= $row . "\n";
		}

		$cases .= 'ELSE ' . $k . ' END, ';
	}

 $sql .= substr($cases, 0, -2) . "\n"; //remove the comma of the last case
 $sql .= ' WHERE ' . $index . ' IN (' . implode(',', $ids) . ')';

 return $db->query($sql);
}