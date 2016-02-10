<?php
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

if (!class_exists('TCPDF')) {
    require_once($CFG->dirroot.'/vendor/vfremaux/moodle-lib_tcpdf/tcpdf.php');
}

class moodle_pdf {

    static function decode_html_color($htmlcolor, $reverse = false) {
        if (preg_match('/#([0-9A-Fa-f][0-9A-Fa-f])([0-9A-Fa-f][0-9A-Fa-f])([0-9A-Fa-f][0-9A-Fa-f])/', $htmlcolor, $matches)) {
            $r = hexdec($matches[1]);
            $v = hexdec($matches[2]);
            $b = hexdec($matches[3]);
            return array($r, $v, $b);
        }
        if ($reverse){
            return array(255,255,255);
        }
        return array(0,0,0);
    }
    
    /**
     * Makes physical path accessible for document integration 
     */
    static function get_path_from_hash($contenthash) {
        global $CFG;
    
        // Detect is local file or not.
        $l1 = $contenthash[0].$contenthash[1];
        $l2 = $contenthash[2].$contenthash[3];
        return "$l1/$l2";
    }
}