<?php
/**
 * Novutec Domain Tools
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Novutec
 * @package    DomainParser
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * @namespace Novutec\WhoisParser
 */
namespace Novutec\WhoisParser;

/**
 * Template for 123-Reg
 *
 * @category   Novutec
 * @package    WhoisParser
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Template_123_reg extends AbstractTemplate
{

    /**
	 * Blocks within the raw output of the whois
	 *
	 * @var array
	 * @access protected
	 */
    protected $blocks = array(1 => '/domain name:(?>[\x20\t]*)(.*?)(?=registrant name\:)/is',
            2 => '/registrant name:(?>[\x20\t]*)(.*?)(?=admin name\:)/is',
            3 => '/admin name:(?>[\x20\t]*)(.*?)(?=tech name\:)/is',
            4 => '/tech name:(?>[\x20\t]*)(.*?)(?=name server\:)/is',
            5 => '/name server:(?>[\x20\t]*)(.*?)(?=created by registrar\:)/is',
            6 => '/domain registration date:(?>[\x20\t]*)(.*?)(?=>>>>)/is');

    /**
	 * items for each block
	 *
	 * @var array
	 * @access protected
	 */
    protected $blockItems = array(
            1 => array('/sponsoring registrar:(?>[\x20\t]*)(.+)$/im' => 'registrar:name',
                    '/sponsoring registrar iana id:(?>[\x20\t]*)(.+)$/im' => 'registrar:id',
                    '/registrar url \(registration services\):(?>[\x20\t]*)(.+)$/im' => 'registrar:url',
                    '/(?>domain )*status:(?>[\x20\t]*)(.+)$/im' => 'status'),
            2 => array('/registrant name:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:name',
                    '/registrant organi[sz]ation:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:organization',
                    '/registrant (street|address)[0-9]*:(?>[\x20\t]+)(.+)$/im' => 'contacts:owner:address',
                    '/registrant city:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:city',
                    '/registrant state\/province:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:state',
                    '/registrant postal code:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:zipcode',
                    '/registrant country:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:country',
                    '/registrant phone:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:phone',
                    '/registrant fax:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:fax',
                    '/registrant email:(?>[\x20\t]*)(.+)$/im' => 'contacts:owner:email'),
            3 => array(
                    '/admin name:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:name',
                    '/admin organi[sz]ation:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:organization',
                    '/admin (street|address)[0-9]*:(?>[\x20\t]+)(.+)$/im' => 'contacts:admin:address',
                    '/admin city:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:city',
                    '/admin state\/province:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:state',
                    '/admin postal code:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:zipcode',
                    '/admin country:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:country',
                    '/admin phone:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:phone',
                    '/admin fax:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:fax',
                    '/admin email:(?>[\x20\t]*)(.+)$/im' => 'contacts:admin:email'),
            4 => array('/tech name:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:name',
                    '/tech organi[sz]ation:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:organization',
                    '/tech (street|address)[0-9]*:(?>[\x20\t]+)(.+)$/im' => 'contacts:tech:address',
                    '/tech city:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:city',
                    '/tech state\/province:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:state',
                    '/tech postal code:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:zipcode',
                    '/tech country:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:country',
                    '/tech phone:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:phone',
                    '/tech fax:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:fax',
                    '/tech email:(?>[\x20\t]*)(.+)$/im' => 'contacts:tech:email'),
            5 => array('/name server:(?>[\x20\t]+)(.+)$/im' => 'nameserver'),
            6 => array('/domain registration date:(?>[\x20\t]*)(.+)$/im' => 'created',
                    '/domain expiration date:(?>[\x20\t]*)(.+)$/im' => 'expires',
                    '/domain last updated date:(?>[\x20\t]*)(.+)$/im' => 'changed'));

    /**
     * RegEx to check availability of the domain name
     *
     * @var string
     * @access protected
     */
    protected $available = '/Not found:/i';
}
