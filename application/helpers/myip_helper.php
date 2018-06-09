<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


/**
 * CodeIgniter IP Helper
 *
 * 
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Takaaki Kurihara
 */

   /**
     * get only host address from IP address
     *
     * @access  private
     * @return  void
     */

     if ( ! function_exists('ip2host'))
     {
        function ip2host($ip, $cidr)
        {
            $IP=explode(".", $ip);
            $SITE=site_url('hosts/search');
            if ($cidr >= 24) {
                echo "<a href=$SITE/$IP[0].$IP[1].$IP[2]>$ip</a>";
            }
            else if ($cidr >= 16 ) {
                echo "<a href=$SITE/$IP[0].$IP[1]>$ip</a>";
            }
            else if ($cidr >= 8 ) {
                echo "<a href=$SITE/$IP[0]>$ip</a>";
            }
            else {
                echo "$ip";
            }
        }
    }
