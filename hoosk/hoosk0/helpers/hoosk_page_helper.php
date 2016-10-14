<?php

	function getTheSearchBox($page=0,$area=0,$beds=0,$search=1,$min=0,$max=0){
		if ($search==1){
			echo "<style>
			#minPriceLetHolder,#maxPriceLetHolder{display:none;}
			</style>";
		} else {
			echo "<style>
			#minPriceSalesHolder,#maxPriceSalesHolder{display:none;}
			</style>";
		}
			$letprice = array(
					"0" => "Min Price",
					"100" => "100 PCM",
					"200" => "200 PCM",
					"300" => "300 PCM",
					"400" => "400 PCM",
					"500" => "500 PCM",
					"600" => "600 PCM",
					"700" => "700 PCM",
					"800" => "800 PCM",
					"900" => "900 PCM",
					"1000" => "1,000 PCM",
					"1250" => "1,250 PCM",
					"1500" => "1,500 PCM",
					"1750" => "1,750 PCM",
					"2000" => "2,000 PCM",
					"3000" => "3,000 PCM",
					"3500" => "3,500 PCM",
					);
					$letpricemax = array(
					"0" => "Max Price",
					"100" => "100 PCM",
					"200" => "200 PCM",
					"300" => "300 PCM",
					"400" => "400 PCM",
					"500" => "500 PCM",
					"600" => "600 PCM",
					"700" => "700 PCM",
					"800" => "800 PCM",
					"900" => "900 PCM",
					"1000" => "1,000 PCM",
					"1250" => "1,250 PCM",
					"1500" => "1,500 PCM",
					"1750" => "1,750 PCM",
					"2000" => "2,000 PCM",
					"3000" => "3,000 PCM",
					"3500" => "3,500 PCM",
					);

					$salesprice = array(
					"0" => "Min Price",
					"50000" => "50,000",
					"60000" => "60,000",
					"70000" => "70,000",
					"80000" => "80,000",
					"90000" => "90,000",
					"100000" => "100,000",
					"110000" => "110,000",
					"120000" => "120,000",
					"130000" => "130,000",
					"140000" => "140,000",
					"150000" => "150,000",
					"160000" => "160,000",
					"170000" => "170,000",
					"180000" => "180,000",
					"190000" => "190,000",
					"200000" => "200,000",
					"210000" => "210,000",
					"220000" => "220,000",
					"230000" => "230,000",
					"240000" => "240,000",
					"250000" => "250,000",
					"260000" => "260,000",
					"270000" => "270,000",
					"280000" => "280,000",
					"290000" => "290,000",
					"300000" => "300,000",
					"310000" => "310,000",
					"320000" => "320,000",
					"330000" => "330,000",
					"340000" => "340,000",
					"350000" => "350,000",
					"360000" => "360,000",
					"370000" => "370,000",
					"380000" => "380,000",
					"390000" => "390,000",
					"400000" => "400,000",
					"425000" => "425,000",
					"450000" => "450,000",
					"475000" => "475,000",
					"500000" => "500,000",
					"550000" => "550,000",
					"600000" => "600,000",
					"650000" => "650,000",
					"700000" => "700,000",
					"800000" => "800,000",
					"900000" => "900,000",
					"1000000" => "1,000,000",
					"1500000" => "1,500,000",
					"2000000" => "2,000,000",
					"3000000" => "3,000,000"
					);
					$salespricemax = array(
					"0" => "Max Price",
					"50000" => "50,000",
					"60000" => "60,000",
					"70000" => "70,000",
					"80000" => "80,000",
					"90000" => "90,000",
					"100000" => "100,000",
					"110000" => "110,000",
					"120000" => "120,000",
					"130000" => "130,000",
					"140000" => "140,000",
					"150000" => "150,000",
					"160000" => "160,000",
					"170000" => "170,000",
					"180000" => "180,000",
					"190000" => "190,000",
					"200000" => "200,000",
					"210000" => "210,000",
					"220000" => "220,000",
					"230000" => "230,000",
					"240000" => "240,000",
					"250000" => "250,000",
					"260000" => "260,000",
					"270000" => "270,000",
					"280000" => "280,000",
					"290000" => "290,000",
					"300000" => "300,000",
					"310000" => "310,000",
					"320000" => "320,000",
					"330000" => "330,000",
					"340000" => "340,000",
					"350000" => "350,000",
					"360000" => "360,000",
					"370000" => "370,000",
					"380000" => "380,000",
					"390000" => "390,000",
					"400000" => "400,000",
					"425000" => "425,000",
					"450000" => "450,000",
					"475000" => "475,000",
					"500000" => "500,000",
					"550000" => "550,000",
					"600000" => "600,000",
					"650000" => "650,000",
					"700000" => "700,000",
					"800000" => "800,000",
					"900000" => "900,000",
					"1000000" => "1,000,000",
					"1500000" => "1,500,000",
					"2000000" => "2,000,000",
					"3000000" => "3,000,000"
					);

					$bedrooms = array(
					"any" => "Bedrooms",
					"1" => "1/Studio",
					"2" => "2",
					"3" => "3",
					"4" => "4",
					"5" => "5"
					);
					$searchoptions = array(
					"1" => "For Sale",
					"2" => "For Let",
					);

					if ($area!="0"){
						$area = " value='".$area."' ";
					} else {
						$area="";
					}

			echo '<div class="search-container content-padding">
			<div class="container">
					<div class="row">
					<div class="col-md-12 text-center">
					<h2>Property Search</h2>
					</div>
					<form action="/submit/search" method="post">
						<div class="col-md-4 col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" name="searchArea" id="area" placeholder="Address, Postcode or Town"'.$area.'>
							</div>
						</div>
						<div class="col-md-4 col-xs-6" id="minPriceLetHolder">
							<div class="form-group">';
							echo form_dropdown('searchMinPriceLet', $letprice, $min, ' class="form-control" id="minPriceLet"');
							echo'</div>
						</div>
						<div class="col-md-4 col-xs-6" id="minPriceSalesHolder">
							<div class="form-group">';
							echo form_dropdown('searchMinPriceSales', $salesprice, $min, ' class="form-control" id="minPriceSales"');
							echo'</div>
						</div>

						<div class="col-md-4 col-xs-6" id="maxPriceLetHolder">
							<div class="form-group">';
								echo form_dropdown('searchMaxPriceLet', $letpricemax, $max, ' class="form-control" id="maxPriceLet"');
							echo '</div>
						</div>

						<div class="col-md-4 col-xs-6" id="maxPriceSalesHolder">
							<div class="form-group">';
							echo form_dropdown('searchMaxPriceSales', $salespricemax, $max, ' class="form-control" id="maxPriceSales"');
							echo'
							</div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="form-group">';
							echo form_dropdown('searchBedrooms', $bedrooms, $beds, ' class="form-control" id="bedrooms"');
							echo'
							</div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="form-group">';
							echo form_dropdown('searchType', $searchoptions, $search, ' class="form-control" id="searchtype" onchange="changePrices()"');
							echo'
							</div>
						</div>
						<div class=" col-md-4">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Search"/>
								</div>
						</div>
						</form>
		        </div>
		    </div>
				</div>';
	}

	function getSearchResults($limit=10,$offset=0,$area, $beds, $search, $min, $max){
		$CI =& get_instance();
		$CI->db->select("*");
		if($area!="any"){
			$CI->db->where("(display_address LIKE '%".$area."%' OR house_name_number LIKE '%".$area."%' OR town LIKE '%".$area."%' OR address_2 LIKE '%".$area."%' OR address_3 LIKE '%".$area."%' OR address_4 LIKE '%".$area."%' OR postcode_1 LIKE '%".$area."%' OR postcode_2 LIKE '%".$area."%')", NULL, FALSE);

		}
		if($min!="0"){
			$CI->db->where('price >=', $min);
		}
		if($max!="0"){
			$CI->db->where('price <=', $max);
		}
		if($beds!="any"){
			$CI->db->where('bedrooms >=', $beds);
		}
		$CI->db->where('channel_id', $search);

		$CI->db->limit($limit, $offset);
		$CI->db->from('hoosk_property');
		$query = $CI->db->get();
		return $query->result_array();
	}



	function getSearchResultsPrevBtn($limit=10,$offset=0,$area, $beds, $search, $min, $max)
	{
		$CI =& get_instance();
		$CI->db->select("*");
		if($area!="any"){
			$CI->db->where("(display_address LIKE '%".$area."%' OR house_name_number LIKE '%".$area."%' OR town LIKE '%".$area."%' OR address_2 LIKE '%".$area."%' OR address_3 LIKE '%".$area."%' OR address_4 LIKE '%".$area."%' OR postcode_1 LIKE '%".$area."%' OR postcode_2 LIKE '%".$area."%')", NULL, FALSE);
		}
		if($min!="0"){
			$CI->db->where('price >=', $min);
		}
		if($max!="0"){
			$CI->db->where('price <=', $max);
		}
		if($beds!="any"){
			$CI->db->where('bedrooms >=', $beds);
		}
		$CI->db->where('channel_id', $search);
		$CI->db->from('hoosk_property');
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$prevNum = $offset-$limit;
		if ($prevNum < 0){ $prevNum = 0; }
		if ($prevNum < $offset){
		echo '<a href="'.BASE_URL.'/search/results/'.$prevNum.'" class="btn btn-primary pull-left">Previous</a>';
		}
	}


	function getSearchResultsNextBtn($limit=10,$offset=0, $area, $beds, $search, $min, $max)
	{
		$CI =& get_instance();
		$CI->db->select("*");
		if($area!=""){
			$CI->db->where("(display_address LIKE '%".$area."%' OR house_name_number LIKE '%".$area."%' OR town LIKE '%".$area."%' OR address_2 LIKE '%".$area."%' OR address_3 LIKE '%".$area."%' OR address_4 LIKE '%".$area."%' OR postcode_1 LIKE '%".$area."%' OR postcode_2 LIKE '%".$area."%')", NULL, FALSE);
		}
		if($min!="0"){
			$CI->db->where('price >=', $min);
		}
		if($max!="0"){
			$CI->db->where('price <=', $max);
		}
		if($beds!="any"){
			$CI->db->where('bedrooms >=', $beds);
		}
		$CI->db->where('channel_id', $search);
		$CI->db->from('hoosk_property');
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$offset++;
		$nextNum = $offset+$limit;
		if ($nextNum > $totPosts){
		} elseif ($nextNum <= $totPosts){
		$nextNum--;
		echo '<a href="'.BASE_URL.'/search/results/'.$nextNum.'" class="btn btn-primary pull-right">Next</a>';}
	}

	function countSearchResults($limit=10,$offset=0, $area, $beds, $search, $min, $max)
		{
			$area=str_replace('%20',' ',$area);

		$CI =& get_instance();
		$CI->db->select("*");
			if($area!="any"){
				$CI->db->where("(display_address LIKE '%".$area."%' OR house_name_number LIKE '%".$area."%' OR town LIKE '%".$area."%' OR address_2 LIKE '%".$area."%' OR address_3 LIKE '%".$area."%' OR address_4 LIKE '%".$area."%' OR postcode_1 LIKE '%".$area."%' OR postcode_2 LIKE '%".$area."%')", NULL, FALSE);
			}
			if($min!="0"){
				$CI->db->where('price >=', $min);
			}
			if($max!="0"){
				$CI->db->where('price <=', $max);
			}
			if($beds!="any"){
				$CI->db->where('bedrooms >=', $beds);
			}
			$CI->db->where('channel_id', $search);
			$CI->db->from('hoosk_property');
			$query = $CI->db->get();
			$totPosts = $query->num_rows();
			$showing = $offset+$limit;
			if ($showing > $totPosts){
			$showing = $totPosts;
			}
			$offset++;
			echo "Showing results ".$offset." - ".$showing." of ".$totPosts;
		}

		function getPropertyDetails($agent_ref){
			$CI =& get_instance();
			$CI->db->select("*");
			$CI->db->where('agent_ref', $agent_ref);
			$CI->db->join('hoosk_branches', 'hoosk_branches.branchID=hoosk_property.branch_id');
			$CI->db->from('hoosk_property');
			$query = $CI->db->get();
			return $query->result_array();
		}
	 function wordlimit($string, $length = 40, $ellipsis = "...")
	{
		$string = strip_tags($string, '<div>');
		$string = strip_tags($string, '<p>');
		$words = explode(' ', $string);
		if (count($words) > $length)
			return implode(' ', array_slice($words, 0, $length)) . $ellipsis;
		else
			return $string.$ellipsis;
	}
	function getSaleType($id){
		$CI =& get_instance();
		$CI->db->where('qualifierID', $id);
		$query=$CI->db->get('hoosk_property_qualifier');
		foreach($query->result_array() as $b){
			if($b['qualifierName']!="Default"){
				echo $b['qualifierName'];
			}
		}
	}
	function getLetFreq($id){
	$CI =& get_instance();
	$CI->db->WHERE('rentfrequencyID',$id);
	$query=$CI->db->get('hoosk_property_rentfrequency');
	foreach($query->result_array() as $b){
	echo $b['rentfrequencyName'];
	}
}
function getLetType($id){
	$CI =& get_instance();
	$CI->db->WHERE('lettypeID',$id);
	$query=$CI->db->get('hoosk_property_lettype');
	foreach($query->result_array() as $b){
	echo $b['lettypeName'];
	}
}
function getFurnishedType($id){
	$CI =& get_instance();
	$CI->db->WHERE('furnishedID',$id);
	$query=$CI->db->get('hoosk_property_furnished');
	foreach($query->result_array() as $b){
	echo $b['furnishedName'];
	}
}
function getPropertyImage($agentref){
	$CI =& get_instance();
	$CI->db->WHERE('agent_ref',$agentref);
	$CI->db->WHERE('sort_order',1);
	$CI->db->WHERE('media_type',1);
	$query=$CI->db->get('hoosk_property_media');
	foreach($query->result_array() as $b){
	echo BASE_URL.$b['media_url'];
	}
}

function getPropertyBrochure($agentref){
	$CI =& get_instance();
	$CI->db->WHERE('agent_ref',$agentref);
	$CI->db->WHERE('media_type',3);
	$query=$CI->db->get('hoosk_property_media');
	foreach($query->result_array() as $b){
		echo '<a href="'.BASE_URL.$b['media_url'].'" class="btn btn-primary" target="_blank">Download Brochure</a>';
	}
}

	//Get the navigation bar
	function hooskNav($slug)
	{
		$CI =& get_instance();
		$CI->db->where('navSlug', $slug);
		$query=$CI->db->get('hoosk_navigation');
		foreach($query->result_array() as $n):
			$totSegments = $CI->uri->total_segments();
			if(!is_numeric($CI->uri->segment($totSegments))){
			$current = "/".$CI->uri->segment($totSegments);
			} else if(is_numeric($CI->uri->segment($totSegments))){
			$current = "/".$CI->uri->segment($totSegments-1);
			}
			if ($current == "/") {$current = BASE_URL;};
			$nav = str_replace('<li><a href="'.$current.'">', '<li class="active"><a href="'.$current.'">', $n['navHTML']);
			echo $nav;
		endforeach;

	}


	//Get the Latest 5 news posts
	function getLatestNewsSidebar()
	{
		$CI =& get_instance();
		$CI->db->order_by("unixStamp", "desc");
		$CI->db->limit(5, 0);
		$query=$CI->db->get('hoosk_post');
		$posts = '<ul class="list-group">';
		foreach($query->result_array() as $c):
			$posts .= '<li class="list-group-item"><a href="/article/'.$c['postURL'].'">'.$c['postTitle'].'</a></li>';
		endforeach;
		$posts .= "</ul>";
		echo $posts;
	}

	//Get the Latest news for the main column
	function getLatestNews($limit=10,$offset=0)
	{
		$CI =& get_instance();
		$CI->db->order_by("unixStamp", "desc");
		$CI->db->limit($limit, $offset);
		$query=$CI->db->get('hoosk_post');
		$posts = '';
		foreach($query->result_array() as $c):
			$date = new DateTime($c['datePosted']);
			$posts .= '<div class="row">';
			if ($c['postImage'] != "") {
			$posts .= '<div class="col-md-3"><a href="/article/'.$c['postURL'].'"><img class="img-responsive" src="'.BASE_URL.'/images/'.$c['postImage'].'" alt="'.$c['postTitle'].'"/></a></div>';
			$posts .= '<div class="col-md-9"><h3><a href="/article/'.$c['postURL'].'">'.$c['postTitle'].'</a></h3>';
			$posts .= '<p class="meta">'.date_format($date, 'd/m/Y').'</p>';
			$posts .= '<p>'.$c['postExcerpt'].'</p>';
			$posts .= '<p><a class="btn btn-primary" href="/article/'.$c['postURL'].'">Read More</a></p>';
			} else {
			$posts .= '<div class="col-md-12"><h3><a href="/article/'.$c['postURL'].'">'.$c['postTitle'].'</a></h3>';
			$posts .= '<p class="meta">'.date_format($date, 'd/m/Y').'</p>';
			$posts .= '<p>'.$c['postExcerpt'].'</p>';
			$posts .= '<p><a class="btn btn-primary" href="/article/'.$c['postURL'].'">Read More</a></p>';			}
			$posts .= '</div>';
			$posts .= "</div><hr />";
		endforeach;
		echo $posts;
	}

		//Get the categories
	function getCategories()
	{
		$CI =& get_instance();
		$CI->db->order_by("categoryTitle", "asc");
		$query=$CI->db->get('hoosk_post_category');
		$categories = '<ul class="list-group">';
		foreach($query->result_array() as $c):
			$CI->db->where('categoryID', $c['categoryID']);
			$CI->db->from('hoosk_post');
			$query = $CI->db->get();
			$totPosts = $query->num_rows();
			if ($totPosts > 0){
			$categories .= '<li class="list-group-item"><a href="/category/'.$c['categorySlug'].'"><span class="badge">'.$totPosts.'</span>'.$c['categoryTitle'].'</a></li>';
			}
		endforeach;
		$categories .= "</ul>";
		echo $categories;
	}

		//Get the total posts
	function countPosts($limit=10,$offset=0)
	{
		$CI =& get_instance();
		$CI->db->from('hoosk_post');
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$offset++;
		echo "Showing posts ".$offset." - ".$showing." of ".$totPosts;
	}

	function countCategoryPosts($categoryID, $limit=10,$offset=0)
	{
		$CI =& get_instance();
		$CI->db->from('hoosk_post');
		$CI->db->where('categoryID', $categoryID);
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$offset++;
		echo "Showing posts ".$offset." - ".$showing." of ".$totPosts;
	}
	function getPrevBtnCategory($categoryID, $limit=10,$offset=0)
	{
		$CI =& get_instance();
		$totSegments = $CI->uri->total_segments();
		$i=1;
		$pagURL = "";
		while ($i <= $totSegments) {
			if(!is_numeric($CI->uri->segment($i))){
			$pagURL .= "/".$CI->uri->segment($i);
			}
			$i++;
		}
		$CI->db->from('hoosk_post');
		$query = $CI->db->get();
		$CI->db->where('categoryID', $categoryID);
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}

		$prevNum = $offset-$limit;
		if ($prevNum < 0){ $prevNum = 0; }
		if ($prevNum < $offset){
		echo '<a href="'.BASE_URL.$pagURL.'/'.$prevNum.'" class="btn btn-success float-left">Previous</a>';
		}
	}

	function getNextBtnCategory($categoryID, $limit=10,$offset=0)
	{
		$CI =& get_instance();
		$totSegments = $CI->uri->total_segments();
		$i=1;
		$pagURL = "";
		while ($i <= $totSegments) {
			if(!is_numeric($CI->uri->segment($i))){
			$pagURL .= "/".$CI->uri->segment($i);
			}
			$i++;
		}
		$CI->db->from('hoosk_post');
		$CI->db->where('categoryID', $categoryID);
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$offset++;
		$nextNum = $offset+$limit;
		if ($nextNum > $totPosts){
		} elseif ($nextNum <= $totPosts){
		$nextNum--;
		echo '<a href="'.BASE_URL.$pagURL.'/'.$nextNum.'" class="btn btn-success float-right">Next</a>';}
	}

	function getPrevBtn($limit=10,$offset=0)
	{
		$CI =& get_instance();
		$totSegments = $CI->uri->total_segments();
		$i=1;
		$pagURL = "";
		while ($i <= $totSegments) {
			if(!is_numeric($CI->uri->segment($i))){
			$pagURL .= "/".$CI->uri->segment($i);
			}
			$i++;
		}
		$CI->db->from('hoosk_post');
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}

		$prevNum = $offset-$limit;
		if ($prevNum < 0){ $prevNum = 0; }
		if ($prevNum < $offset){
		echo '<a href="'.BASE_URL.$pagURL.'/'.$prevNum.'" class="btn btn-success float-left">Previous</a>';
		}
	}

	function getNextBtn($limit=10,$offset=0)
	{
		$CI =& get_instance();
		$totSegments = $CI->uri->total_segments();
		$i=1;
		$pagURL = "";
		while ($i <= $totSegments) {
			if(!is_numeric($CI->uri->segment($i))){
			$pagURL .= "/".$CI->uri->segment($i);
			}
			$i++;
		}
		$CI->db->from('hoosk_post');
		$query = $CI->db->get();
		$totPosts = $query->num_rows();
		$showing = $offset+$limit;
		if ($showing > $totPosts){
		$showing = $totPosts;
		}
		$offset++;
		$nextNum = $offset+$limit;
		if ($nextNum > $totPosts){
		} elseif ($nextNum <= $totPosts){
		$nextNum--;
		echo '<a href="'.BASE_URL.$pagURL.'/'.$nextNum.'" class="btn btn-success float-right">Next</a>';}
	}

	//Get the Latest news for the main column
	function getCategoryNews($categoryID,$limit=10,$offset=0)
	{
		$CI =& get_instance();
		$CI->db->order_by("unixStamp", "desc");
		$CI->db->limit($limit, $offset);
		$CI->db->where('categoryID', $categoryID);
		$query=$CI->db->get('hoosk_post');
		$posts = '';
		foreach($query->result_array() as $c):
			$date = new DateTime($c['datePosted']);
			$posts .= '<div class="row">';
			if ($c['postImage'] != "") {
			$posts .= '<div class="col-md-3"><a href="/article/'.$c['postURL'].'"><img class="img-responsive" src="'.BASE_URL.'/images/'.$c['postImage'].'" alt="'.$c['postTitle'].'"/></a></div>';
			$posts .= '<div class="col-md-9"><h3><a href="/article/'.$c['postURL'].'">'.$c['postTitle'].'</a></h3>';
			$posts .= '<p class="meta">'.date_format($date, 'd/m/Y').'</p>';
			$posts .= '<p>'.$c['postExcerpt'].'</p>';
			$posts .= '<p><a class="btn btn-primary" href="/article/'.$c['postURL'].'">Read More</a></p>';
			} else {
			$posts .= '<div class="col-md-12"><h3><a href="/article/'.$c['postURL'].'">'.$c['postTitle'].'</a></h3>';
			$posts .= '<p class="meta">'.date_format($date, 'd/m/Y').'</p>';
			$posts .= '<p>'.$c['postExcerpt'].'</p>';
			$posts .= '<p><a class="btn btn-primary" href="/article/'.$c['postURL'].'">Read More</a></p>';			}
			$posts .= '</div>';
			$posts .= "</div><hr />";
		endforeach;
		echo $posts;
	}


		//Get the carousel
	function getCarousel($id)
	{
		$CI =& get_instance();
		$CI->db->order_by("slideOrder", "asc");
		$CI->db->where("pageID", $id);
		$query=$CI->db->get('hoosk_banner');
		$carousel = '<ol class="carousel-indicators">'."\r\n";
		$s = 0;
		foreach($query->result_array() as $c):
			if ($s == 0){
				$carousel .= '<li data-target="#carousel" data-slide-to="'.$s.'" class="active"></li>'."\r\n";
			} else {
				$carousel .= '<li data-target="#carousel" data-slide-to="'.$s.'"></li>'."\r\n";
			}
			$s++;
		endforeach;
		$s = 0;
		$carousel .= '</ol><div class="carousel-inner" role="listbox">'."\r\n";
		foreach($query->result_array() as $c):
			if ($s == 0){
			  $carousel .= '<div class="item active">'."\r\n";
			  if ($c['slideLink'] != "") {
			  	$carousel .= '<a target="_blank" href="'.$c['slideLink'].'">'."\r\n";
			  }
			  $carousel .= '<img src="'.BASE_URL."/uploads/".$c['slideImage'].'" alt="'.$c['slideAlt'].'">'."\r\n";
			  if ($c['slideLink'] != "") {
			 	$carousel .= '</a>'."\r\n";
			  }
			  $carousel .= '</div>'."\r\n";
			} else {
			  $carousel .= '<div class="item">'."\r\n";
			  if ($c['slideLink'] != "") {
			  	$carousel .= '<a target="_blank" href="'.$c['slideLink'].'">'."\r\n";
			  }
			  $carousel .= '<img src="'.BASE_URL."/uploads/".$c['slideImage'].'" alt="'.$c['slideAlt'].'">'."\r\n";
			  if ($c['slideLink'] != "") {
			 	$carousel .= '</a>'."\r\n";
			  }
			  $carousel .= '</div>'."\r\n";
			}
			$s++;
		endforeach;
		$carousel .= "</div>"."\r\n";
		echo $carousel;
	}

	//Get the carousel
function getPropertyCarousel($agent_ref)
{
	$CI =& get_instance();
	$CI->db->order_by("sort_order", "asc");
	$CI->db->where("agent_ref", $agent_ref);
	$query=$CI->db->get('hoosk_property_media');
	$carousel = '<ol class="carousel-indicators">'."\r\n";
	$s = 0;
	foreach($query->result_array() as $c):
		if ($s == 0){
			$carousel .= '<li data-target="#carousel" data-slide-to="'.$s.'" class="active"></li>'."\r\n";
		} else {
			$carousel .= '<li data-target="#carousel" data-slide-to="'.$s.'"></li>'."\r\n";
		}
		$s++;
	endforeach;
	$s = 0;
	$carousel .= '</ol><div class="carousel-inner" role="listbox">'."\r\n";
	foreach($query->result_array() as $c):
		if ($s == 0){
			$carousel .= '<div class="item active">'."\r\n";
			$carousel .= '<img src="'.BASE_URL.$c['media_url'].'" alt="'.$c['caption'].'">'."\r\n";
			$carousel .= '</div>'."\r\n";
		} else {
			$carousel .= '<div class="item">'."\r\n";
			$carousel .= '<img src="'.BASE_URL.$c['media_url'].'" alt="'.$c['caption'].'">'."\r\n";
			$carousel .= '</div>'."\r\n";
		}
		$s++;
	endforeach;
	$carousel .= "</div>"."\r\n";
	echo $carousel;
}

	//Get social
	function getSocial()
	{
		$CI =& get_instance();
		$CI->db->where("socialEnabled", 1);
		$query=$CI->db->get('hoosk_social');
		$social = '';
		foreach($query->result_array() as $c):
			$social .= '<a href="'.$c['socialLink'].'" target="_blank"><span class="socicon socicon-'.$c['socialName'].'"></span></a>';
		endforeach;
		echo $social;
	}



?>
