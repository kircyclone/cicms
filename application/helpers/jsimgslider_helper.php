<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('jsisaddfiles1'))
{
	function jsisaddfiles1(){
		$jsisaddfiles = '<link href="'.base_url("assets/modules/jsImgSlider/themes/1/js-image-slider.css").'" rel="stylesheet" type="text/css" />
						 <script src="'.base_url("assets/modules/jsImgSlider/themes/1/js-image-slider.js").'" type="text/javascript"></script>
						 <link href="'.base_url("assets/modules/jsImgSlider/generic.css").'" rel="stylesheet" type="text/css" />';
	return $jsisaddfiles;
	}
}
if ( ! function_exists('jsisslider1')){
	function jsisslider1($albumarr){
		if(is_array($albumarr) && count($albumarr) > 0){
			//if($jsisslider == "") 
		$jsisslider = "";
		//$jsisslider = jsisaddfiles();

			$jsisslider .= '<div id="sliderFrame"><div id="slider">';
			foreach($albumarr as $albumarrkey => $albumarrval){
				$imagepath = base_url("assets/uploads/images/".date("Y/m/d",$albumarrval['addedtime'])."/".$albumarrval['imagename']);
				$jsisslider .= '<img src="'.$imagepath.'" alt="'.$albumarrval['imagecaption'].'" />';				
			}
			$jsisslider .= '</div>';
			
			$jsisslider .= '</div>';
		return $jsisslider;
		}
	}
}


if ( ! function_exists('jsisaddfiles2'))
{
	function jsisaddfiles2(){
		$jsisaddfiles = '<link href="'.base_url("assets/modules/jsImgSlider/themes/2/js-image-slider.css").'" rel="stylesheet" type="text/css" />
						 <script src="'.base_url("assets/modules/jsImgSlider/themes/2/js-image-slider.js").'" type="text/javascript"></script>
						 <link href="'.base_url("assets/modules/jsImgSlider/generic.css").'" rel="stylesheet" type="text/css" />';
	return $jsisaddfiles;
	}
}
if ( ! function_exists('jsisslider2')){
	function jsisslider2($albumarr){
		if(is_array($albumarr) && count($albumarr) > 0){
			//if($jsisslider == "") 
		$jsisslider = "";
		$jsissliderthumb = "";
		//$jsisslider = jsisaddfiles();

			$jsisslider .= '<div id="sliderFrame"><div id="slider">';
			foreach($albumarr as $albumarrkey => $albumarrval){
				$imagepath = base_url("assets/uploads/images/".date("Y/m/d",$albumarrval['addedtime'])."/".$albumarrval['imagename']);
				$jsisslider .= '<a class="lazyImage" href="'.$imagepath.'" title="'.$albumarrval['imagecaption'].'">'.$albumarrval['imagecaption'].'</a>';
				
				$jsissliderthumb .= '<div class="thumb">';
				$jsissliderthumb .= '
				<div class="frame"><img src="'.$imagepath.'" /></div>
				<div class="thumb-content">'.$albumarrval['imagecaption'].'</div>
				<div style="clear:both;"></div>
				';
				//$jsissliderthumb .= '<a class="lazyImage" href="'.$imagepath.'" title="'.$albumarrval['imagecaption'].'">'.$albumarrval['imagecaption'].'</a>';
				$jsissliderthumb .= '</div>';
			}
			$jsisslider .= '</div>';
		
			$jsisslider .= '<div id="thumbs">';
				$jsisslider .= $jsissliderthumb;
			$jsisslider .= '</div>';
			$jsisslider .= '</div>';
		return $jsisslider;
		}
	}
}