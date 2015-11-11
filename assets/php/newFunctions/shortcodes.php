<?php
// Short Codes
	add_action( 'init', 'register_shortcodes');

	function register_shortcodes() {
	  add_shortcode('button', 'button_function');
	  add_shortcode('inline_callout', 'inline_callout_function');
	  add_shortcode('page_intro', 'page_intro_function');
	}

	function button_function( $atts, $content = null ) {
	  extract(
	    shortcode_atts(
	      array( 'link' => '#', ),
	      $atts
	    )
	  );
	  return '<a href="'.$link.'" class="button">'.do_shortcode($content).'</a>';
	}

	function link_function( $atts, $content = null ) {
	  extract(
	    shortcode_atts(
	      array( 'link' => '#', ),
	      $atts
	    )
	  );
	  return '<a href="'.$link.'" class="link">'.do_shortcode($content).'</a>';
	}

	function inline_callout_function( $atts, $content = null ) {
		return '<div class="callout">'.do_shortcode($content).'</div>';
	}

	function page_intro_function( $atts, $content = null ) {
		return '<p class="page-intro">'.do_shortcode($content).'</p>';
	}

	function add_plugin( $plugin_array ) {
	   $plugin_array['page_intro_function'] = get_template_directory_uri() . '/js/shortcodes.js';
	   return $plugin_array;
	}

	function videos($atts, $content = null){
	extract(shortcode_atts(array(
        'name' => ''
    ), $atts));

	$output;

	$all = '

		<iframe width="560" height="315" src="//www.youtube.com/embed/aBV8Riqnq4I?list=PLBfGqKMcgPe-z3Nb4hSq5qgi6pmO2t23S&listType=playlist&rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

	';

	$terry = '<strong>Meet Terrie</strong>
				<p>
				Terrie, who lived in North Carolina, began smoking in high school. At 40, she was diagnosed with oral and throat cancers and had her larynx removed. In September of 2013, at the age of 53, Terrie lost her battle with cancer. Terrie wanted to share her story so that others would be inspired to quit smoking, or better yet, never start.
				<br>
				<a target="_blank" href="http://www.youtube.com/playlist?list=PLBfGqKMcgPe9OZGICGlr2SpisDP_NBHtR">Learn more about Terrie</a>
				<br><br>
				<div class="youtubeWrapper" style="position:relative;  z-index:0;">

						<iframe width="560" height="315" src="//www.youtube.com/embed/YIjpK2CzpQo?list=PLBfGqKMcgPe8l7r7qMOP6zNLB9xVGW66X&listType=playlist&rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

				</div>	</p>

		';

	$mike = '<strong>Meet Michael</strong><p>
			Michael, who is in his 50s, has Chronic Obstructive Pulmonary Disease (COPD) —a condition caused by smoking—that makes it harder and harder to breathe.<br>
			<a href="http://www.youtube.com/playlist?list=PLBfGqKMcgPe8gZLXIG9YSZbCFggyQeE2O" target="_blank">
				Learn more about Michael
			</a>
			<br><br>
<iframe width="560" height="315" src="//www.youtube.com/embed/q-5N_HR0qbE?list=PLBfGqKMcgPe8gZLXIG9YSZbCFggyQeE2O&rel=0" frameborder="0" allowfullscreen></iframe>
			</p>

		';

	$bill = '<strong>Meet Bill </strong>
			<p>
			Bill lived in Michigan and had diabetes. At 15, he started smoking cigarettes. At 39, he quit smoking after his leg was amputated due to poor circulation—made worse from smoking.
			<br>
			Bill died in August 2014 from heart disease. He was 42.
			<br>
			<a target="_blank" href="http://www.cdc.gov/tobacco/campaign/tips/stories/bill.html"> For more on Bill’s story</a>
			<br>
			<a target="_blank" href="http://healthvermont.gov/prevent/diabetes/diabetes.aspx">To learn more about diabetes management</a>
			<br><br>
			<iframe width="560" height="315" src="//www.youtube.com/embed/MdJi8U4VSmk?list=PLBfGqKMcgPe8l7r7qMOP6zNLB9xVGW66X&rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
			</p>

		';

	$roose	='<strong>Meet Roosevelt </strong>
			<p>
			Like many smokers, Roosevelt started experimenting with cigarettes in his teens. But his addiction became entrenched during his time in the military. Nearly 30 years later, damage from smoking began to take its toll.
			</p><p>
			At 45, Roosevelt experienced a heart attack that landed him in the hospital for a month. In order to repair the damage to his heart caused by smoking, doctors inserted stents into his heart. When that wasn\'t enough, he had bypass surgery — six bypasses in all. Now 51, Roosevelt has been smoke-free for 3 years, but he\'s had to give up his career as a commercial plumber because his heart no longer is strong enough for the strenuous activity such work requires.
			</p>
			<iframe width="560" height="315" src="//www.youtube.com/embed/xzMBHSUYOfo?list=PLBfGqKMcgPe8gZLXIG9YSZbCFggyQeE2O&rel=0" frameborder="0" allowfullscreen></iframe>
			<br><br>


	';
	$tip = '<p>If you\'d like to get help in person, there are local Vermont Quit Network Quit Partners available in communities throughout Vermont.</p>

 		<p>Just like the phone coaches, they\'ll help you set your quit date and get ready to quit. And, they also offer free nicotine replacement - gum, patches or lozenges - when you use the service, and it\'s shipped directly to your home. Once you\'ve quit, they\'ll help you with advice and support. Remember, quitting is tough, but it\'s easier when there\'s someone to help you. To find a Quit Partner in your area, <a href="'.home_url().'/in-person-quit-help/find-a-vermont-quit-partner/">click here</a>.</p>
		<iframe width="560" height="315" src="//www.youtube.com/embed/6S5oIMiIgAk?rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
	';

	$NRT = '
		<iframe width="560" height="315" src="//www.youtube.com/embed/t4Jzh6R6rTY?list=PLBfGqKMcgPe_i2jobQ0vFeYsgMQYOZJQb&listType=playlist&rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe><br>
	';

	$tipsPlay = '
			<br><iframe width="560" height="315" src="//www.youtube.com/embed/G2YVFijgSro?list=PLBfGqKMcgPe8l7r7qMOP6zNLB9xVGW66X&rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe><br><br>

	';




	switch($atts["name"]){
		case "terry" :
			$output = $terry;
			break;
		case "bill" :
			$output = $bill;
			break;
		case "mike" :
			$output = $mike;
			break;
		case "roosevelt":
			$output = $roose;
			break;
		case "stories":
			$output = $all;
			break;
		case 'nrt' :
			$output = $NRT;
			break;
		case 'tipsPlay' :
			$output = $tipsPlay;
			break;
		default:
			$output = $tip;
			break;
	}

	return $output;

}

add_shortcode('vidTips', 'videos');



function short_Calc($atts, $content = null){
	$css = get_template_directory_uri().'/css/calCss.css';
	$url = get_template_directory_uri()."/js/calScript.js";

	$style = '<link href="'.$css.'" rel="stylesheet" type="text/css">' ;
	$script = '<script type="text/javascript" src="'.$url.'"></script>';

	$div .= '<div id="calculatorMain">
				<h2>Money In Your Pocket</h2>
				<form name="CFForm_1" id="CFForm_1" method="post" onsubmit="return _CF_checkCFForm_1(this)">

				<div id="ciginputs">
					<input name="cigarettes" type="text"  id="cigarettes"  />

					<label id="cigarettesLabel">Enter the number of cigarettes <br> you smoke in a day.</label>
					<div class="clear"></div>
				</div>
				<div id="amountinputs">
					<input type="text" id="amount"  />
					<label id="amountLab">Enter the amount of money that <br> you spend per pack</label>
					<div class="clear"></div>
				</div>
				<div id="amountinputs">
					<input type="submit" id="go"  value="Click To Find Out How Much You\'re Spending"/>


				</div>
				<div id="resultCont">
					<div id="results">
						<input type="text" maxlength="2"  id="resultsInput"  />
						<label id="resultLabel">is the amount that you spend <br>on cigarettes in a week. </label>
						<div class="clear"></div>
					</div>
					<div id="use">
						<label id="useLabel">You could also use that money for...</label><br>
						<label id="useInput"></label>
						<input type="submit" id="clear"  value="Clear"/>
						<div class="clear"></div>
					</div>
				</div>
			</form>
		</div>
		';
	$output = $style.$div.$script;

	return $output;

}
add_shortcode('calculator', 'short_Calc');


function youtube_videos($atts, $content = null ){
	//this short code breaks apart the share url and makes it usable for an iframe
	extract(shortcode_atts(array(
        'url' => '',
        'title' => '',
        'playlist' => 'no'
    ), $atts));

    $ytArray = array(); //this will hold all of the stuff after the ?

	$ytArray = explode('embed/', $url);

    $output = "";
  	if($title != ""){
    	$output .="<div><a href='http://youtu.be/".$ytArray[1]."'>";
    	$output .= "<strong>".$title."</strong>";
    	$output .= "</a></div>";
    }
	$output .= '<div class="embed-responsive embed-responsive-16by9" style="position:relative;  z-index:0;">';
	$output .= '<iframe width="560" height="315" src="' .$url . '?rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>';
	$output .= '</div>';


    return $output;

}
add_shortcode('youtube', 'youtube_videos');


//Google Map

function googleMap($atts, $content = null){
	extract(shortcode_atts(array(
        'mobile' => ''
    ), $atts));

	$gm = "http://maps.googleapis.com/maps/api/js?key=AIzaSyD1n6pUKrhmbVb9_MAnvfkJlra6GcGPaJ0&sensor=false";

	if($atts["mobile"] == "mobile"){
		$gmJ =  get_template_directory_uri()."/js/googleAjaxM.js";
	}
	else{
		$gmJ =  get_template_directory_uri()."/js/googleAjax.js";
	}

	$output = '<style type="text/css">#map-canvas img{max-width:none;}</style>'; //this will be moved to the CSS file later
    $output .= '<div id="map-canvas" class="col-lg-12 col-sm-12" ></div>';
   	$output .= '<script type="text/javascript" src="'.$gm.'"></script>';
   	$output .= '<script type="text/javascript" src="'.$gmJ.'"></script>';

    return $output;

}

//add_action( 'wp_enqueue_script', 'gmScripts' );
//add_shortcode('gmQuit', 'googleMap');

function newGM(){
	$output = '
	<style type="text/css">#cm_map img{max-width:none;}</style>'; //this will be moved to the CSS file later
    $output .= '<div id="cm_map" class="col-lg-12 col-sm-12" style="width:650px; height:500px; margin-bottom:20px;" ></div>


<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyD1n6pUKrhmbVb9_MAnvfkJlra6GcGPaJ0"
  type="text/javascript"></script>



<script src="'.get_template_directory_uri().'/js/googleMap2.js"
  type="text/javascript"></script>
   <script src="https://spreadsheets.google.com/feeds/list/0Ai8Hpiv1idXndDdsaDhoU0NfUjNodWk0Z09JQkF2Q2c/od6/public/values?alt=json-in-script&callback=cm_loadMapJSON" type="text/javascript" id="jsonScript"></script>
  ';

  return $output;
}
//add_shortcode("new_gm", "newGM");