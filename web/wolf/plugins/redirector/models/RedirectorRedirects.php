<?php
/*
 * Redirector Plugin for WolfCMS <http://www.wolfcms.org>
 * Copyright (c) 2011 Shannon Brooks <http://www.brooksworks.com>
 * Adapted from Redirector by Design Spike <http://designspike.ca>
 * Major contributions and original idea by Cody at Design Spike
 *
 * Licensed under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home
 * http://www.github.com/realslacker/Redirector-Plugin
 */

class RedirectorRedirects extends Record {

	const TABLE_NAME = 'redirector_redirects';

	//	search function to perform query
	public static function find($args=array()) {

		$tablename = self::tableNameFromClassName('RedirectorRedirects');

		//	prepare attributes
		$where = isset($args['where']) ? trim($args['where']) : '1';
		$order_by = isset($args['order']) ? trim($args['order']) : 'redirects.url ASC';
		$offset = isset($args['offset']) ? (int)$args['offset'] : 0;
		$limit = isset($args['limit']) ? (int)$args['limit'] : 0;

		//	prepare query parts
		$order_by_string = empty($order_by) ? '' : "ORDER BY {$order_by}";
		$limit_string = $limit > 0 ? "LIMIT {$limit}" : '';
		$offset_string = $offset > 0 ? "OFFSET {$offset}" : '';

		//	prepare sql
		$sql = "SELECT * FROM {$tablename} AS redirects WHERE {$where} {$order_by_string} {$limit_string} {$offset_string}";
		$stmt = self::$__CONN__->prepare($sql);
		$stmt->execute();

		//	requests with single item limit return a single object
		if ($limit == 1) return $stmt->fetchObject('RedirectorRedirects');

		//	otherwise return an array of objects
		$objects = array();
		while ($object = $stmt->fetchObject('RedirectorRedirects')) $objects[] = $object;
		return $objects;

	} //*/


	//	find all records
	public static function findAll($args = array()) {
		return self::find($args);
	} //*/


	//	find a specific record by it's id
	public static function findById($id) {
		return self::find(array(
			'where' => 'redirects.id=' . self::escape((int)$id),
			'limit' => 1
		));
	} //*/
	
	
	//	find a specific record by it's url
	public static function findByURL($url) {
		return self::find(array(
			'where' => 'redirects.url=' . self::escape($url),
			'limit' => 1
		));
	} //*/

}
// EOF