<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();

		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		function rupiah($angka){

		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;

		}
		//???????????????????AgungAGUNGAUANAGUANAG
		function nominal($angka){

		$hasil_rupiah = number_format($angka,2,',','.');
		return $hasil_rupiah;

		}
		// AgungAGUNGAUANAGUANAG??????????????
		/**
* Converts human readable file size (e.g. 10 MB, 200.20 GB) into bytes.
*
* @param string $str
* @return int the result is in bytes
* @author Svetoslav Marinov
* @author http://slavi.biz
*/
function formatSizeUnits($bytes)
	{
			if ($bytes >= 1073741824)
			{
					$bytes = number_format($bytes / 1073741824, 2) . ' GB';
			}
			elseif ($bytes >= 1048576)
			{
					$bytes = number_format($bytes / 1048576, 2) . ' MB';
			}
			elseif ($bytes >= 1024)
			{
					$bytes = number_format($bytes / 1024, 2) . ' KB';
			}
			elseif ($bytes > 1)
			{
					$bytes = $bytes . ' bytes';
			}
			elseif ($bytes == 1)
			{
					$bytes = $bytes . ' byte';
			}
			else
			{
					$bytes = '0 bytes';
			}

			return $bytes;
}
function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
