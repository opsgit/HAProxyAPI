<?php
/**
 * HAProxyAPI is a PHP API to access/administrate HAProxy via
 * UNIX Sockets, TCP Sockets and/or the HAProxy HTTP interface.
 * 
 * HAProxyAPI was written by Steve Kamerman, 2012 and is distributed
 * via GitHub at https://github.com/kamermans/HAProxyAPI
 * 
 *  @author Steve Kamerman
 *  @copyright Steve Kamerman, 2012
 *  @license GNU GPLv3
 * 
 * This file is part of HAProxyAPI.
 *
 * HAProxyAPI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * HAProxyAPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with HAProxyAPI.  If not, see <http://www.gnu.org/licenses/>.
 */
class HAProxy_Command_Stats extends HAProxy_Command_Base {
	
	public function getSocketCommand() {
		return 'show stat';
	}
	/**
	 * Represents an HTTP command
	 * @return HAProxy_Command_HttpModel
	 * @throws HAProxy_Command_NotImplementedException
	 */
	public function getHttpCommand() {
		return new HAProxy_Command_HttpModel(array('csv' => null), 'get');
	}
	
	public function processHttpResponse($response) {
		list($headers, $body) = preg_split('/\r\n\r\n/', $response, 2);
		return $body;
	}
}