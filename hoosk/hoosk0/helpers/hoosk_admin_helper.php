<?php

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

	function hasCurrentPDF($id){
		$CI =& get_instance();
		$CI->db->where("agent_ref", $id);
		$CI->db->where("media_type", 3);
		$query=$CI->db->get('hoosk_property_media');
		$array = array();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function getCurrentPDF($id){
		$CI =& get_instance();
		$CI->db->where("agent_ref", $id);
		$CI->db->where("media_type", 3);
		$query=$CI->db->get('hoosk_property_media');
		$array = array();
		if ($query->num_rows() > 0) {
			foreach($query->result_array() as $c):
					return $c['media_url'];
			endforeach;
		}
	}

	function getDropdownBranches(){
		$CI =& get_instance();
		$CI->db->order_by("branchName", 'ASC');
		$query=$CI->db->get('hoosk_branches');
		$array = array();
		if ($query->num_rows() > 0) {
			$array[''] = 'Please Select';
			foreach($query->result_array() as $c):
					$array[$c['branchID']] = $c['branchName'];
			endforeach;
		} else {
			$array[0] = 'No branches have been created';
		}
		return $array;
	}

	function checkBranchHasProperties($id){
		$CI =& get_instance();
		$CI->db->where("branch_id", $id);
		$query=$CI->db->get('hoosk_property');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
function checkAgentRef($ref){
	$CI =& get_instance();
	$CI->db->where("agent_ref", $ref);
	$query=$CI->db->get('hoosk_property');
	if ($query->num_rows() > 0) {
		echo "1";
	} else {
		echo "0";
	}
}
	function getDropdownOptions($table){
		$CI =& get_instance();
		$CI->db->order_by($table."ID", 'ASC');
		$query=$CI->db->get('hoosk_property_'.$table);
		$array = array();
		foreach($query->result_array() as $c):
				$array[$c[$table.'ID']] = $c[$table.'Name'];
		endforeach;
		return $array;
	}

	function getDropdownOptionsType($table){
		$CI =& get_instance();
		$CI->db->order_by($table."GroupName", 'ASC');
		$query=$CI->db->get('hoosk_property_'.$table);
		$array = array();
		foreach($query->result_array() as $c):
				$array[$c[$table.'ID']] = $c[$table.'Name']." - ".$c[$table.'GroupName'];
		endforeach;
		return $array;
	}

	function getNumberArray($total){
		$array = array();
		for ($x = 0; $x <= $total; $x++) {
    		$array[$x] = $x;
		}
		return $array;
	}

	function getPropertyDetails($agent_ref){
		$CI =& get_instance();
		$CI->db->where('agent_ref', $agent_ref);
		$query=$CI->db->get('hoosk_property');
		$results=$query->result_array();
		if ($results[0]['channel_id']==1){
			$feed['network']['network_id'] = NETWORK_ID;
			$feed['branch']['branch_id'] = getRightmoveBranch($results[0]['branch_id']);
			$feed['branch']['channel'] = $results[0]['channel_id'];
			$feed['branch']['overseas'] = ($results[0]['overseas'] == 1 ? true : false);
			$feed['property']['agent_ref'] = $results[0]['agent_ref'];
			$feed['property']['published'] = ($results[0]['published'] == 1 ? true : false);
			$feed['property']['property_type'] = $results[0]['property_type'];
			$feed['property']['status'] = $results[0]['status'];
			$feed['property']['new_home'] = ($results[0]['new_home'] == 1 ? true : false);
			$feed['property']['create_date'] = $results[0]['create_date'];
			$feed['property']['update_date'] = $results[0]['update_date'];
			$feed['property']['address']['house_name_number'] = $results[0]['house_name_number'];
			$feed['property']['address']['address_2'] = $results[0]['address_2'];
			$feed['property']['address']['address_3'] = $results[0]['address_3'];
			$feed['property']['address']['town'] = $results[0]['town'];
			$feed['property']['address']['postcode_1'] = $results[0]['postcode_1'];
			$feed['property']['address']['postcode_2'] = $results[0]['postcode_2'];
			$feed['property']['address']['display_address'] = $results[0]['display_address'];
			$feed['property']['address']['latitude'] = $results[0]['latitude'];
			$feed['property']['address']['longitude'] = $results[0]['longitude'];
			$feed['property']['price_information']['price'] = $results[0]['price'];
			$feed['property']['price_information']['price_qualifier'] = $results[0]['price_qualifier'];
			$feed['property']['details']['summary'] = $results[0]['summary'];
			$feed['property']['details']['description'] = $results[0]['description'];
			$feed['property']['details']['bedrooms'] = $results[0]['bedrooms'];
			$feed['property']['details']['bathrooms'] = $results[0]['bathrooms'];
			$feed['property']['details']['reception_rooms'] = $results[0]['reception_rooms'];
			$feed['property']['media'] = getPropertyMedia($results[0]['agent_ref']);
			$feed['property']['principal']['principal_email_address'] = $results[0]['principal_email_address'];
			$feed['property']['principal']['auto_email_updates'] = ($results[0]['auto_email_updates'] == 1 ? true : false);
			$feed['property']['principal']['auto_email_when_live'] = ($results[0]['auto_email_when_live'] == 1 ? true : false);
		} else {
			$feed['network']['network_id'] = NETWORK_ID;
			$feed['branch']['branch_id'] = getRightmoveBranch($results[0]['branch_id']);
			$feed['branch']['channel'] = $results[0]['channel_id'];
			$feed['branch']['overseas'] = ($results[0]['overseas'] == 1 ? true : false);
			$feed['property']['agent_ref'] = $results[0]['agent_ref'];
			$feed['property']['published'] = ($results[0]['published'] == 1 ? true : false);
			$feed['property']['property_type'] = $results[0]['property_type'];
			$feed['property']['status'] = $results[0]['status'];
			$feed['property']['new_home'] = ($results[0]['new_home'] == 1 ? true : false);
			$feed['property']['student_property'] = ($results[0]['student_property'] == 1 ? true : false);
			$feed['property']['house_flat_share'] = ($results[0]['house_flat_share'] == 1 ? true : false);
			$feed['property']['contract_months'] = $results[0]['contract_months'];
			$feed['property']['minimum_term'] = $results[0]['minimum_term'];
			$feed['property']['let_type'] = $results[0]['let_type'];
			$feed['property']['create_date'] = $results[0]['create_date'];
			$feed['property']['update_date'] = $results[0]['update_date'];
			$feed['property']['date_available'] = $results[0]['date_available'];
			$feed['property']['address']['house_name_number'] = $results[0]['house_name_number'];
			$feed['property']['address']['address_2'] = $results[0]['address_2'];
			$feed['property']['address']['address_3'] = $results[0]['address_3'];
			$feed['property']['address']['town'] = $results[0]['town'];
			$feed['property']['address']['postcode_1'] = $results[0]['postcode_1'];
			$feed['property']['address']['postcode_2'] = $results[0]['postcode_2'];
			$feed['property']['address']['display_address'] = $results[0]['display_address'];
			$feed['property']['address']['latitude'] = $results[0]['latitude'];
			$feed['property']['address']['longitude'] = $results[0]['longitude'];
			$feed['property']['price_information']['price'] = $results[0]['price'];
			$feed['property']['price_information']['price_qualifier'] = $results[0]['price_qualifier'];
			$feed['property']['price_information']['rent_frequency'] = $results[0]['rent_frequency'];
			$feed['property']['price_information']['deposit'] = $results[0]['deposit'];
			$feed['property']['price_information']['administration_fee'] = $results[0]['administration_fee'];
			$feed['property']['details']['summary'] = $results[0]['summary'];
			$feed['property']['details']['description'] = $results[0]['description'];
			$feed['property']['details']['bedrooms'] = $results[0]['bedrooms'];
			$feed['property']['details']['bathrooms'] = $results[0]['bathrooms'];
			$feed['property']['details']['reception_rooms'] = $results[0]['reception_rooms'];
			$feed['property']['details']['furnished_type'] = $results[0]['furnished_type'];
			$feed['property']['details']['pets_allowed'] = ($results[0]['pets_allowed'] == 1 ? true : false);
			$feed['property']['details']['smokers_considered'] = ($results[0]['smokers_considered'] == 1 ? true : false);
			$feed['property']['details']['housing_benefit_considered'] = ($results[0]['housing_benefit_considered'] == 1 ? true : false);
			$feed['property']['details']['sharers_considered'] = ($results[0]['sharers_considered'] == 1 ? true : false);
			$feed['property']['details']['burglar_alarm'] = ($results[0]['burglar_alarm'] == 1 ? true : false);
			$feed['property']['details']['washing_machine'] = ($results[0]['washing_machine'] == 1 ? true : false);
			$feed['property']['details']['dishwasher'] = ($results[0]['dishwasher'] == 1 ? true : false);
			$feed['property']['details']['all_bills_inc'] = ($results[0]['all_bills_inc'] == 1 ? true : false);
			$feed['property']['details']['water_bill_inc'] = ($results[0]['water_bill_inc'] == 1 ? true : false);
			$feed['property']['details']['gas_bill_inc'] = ($results[0]['gas_bill_inc'] == 1 ? true : false);
			$feed['property']['details']['electricity_bill_inc'] = ($results[0]['electricity_bill_inc'] == 1 ? true : false);
			$feed['property']['details']['oil_bill_inc'] = ($results[0]['oil_bill_inc'] == 1 ? true : false);
			$feed['property']['details']['council_tax_inc'] = ($results[0]['council_tax_inc'] == 1 ? true : false);
			$feed['property']['details']['tv_licence_inc'] = ($results[0]['tv_licence_inc'] == 1 ? true : false);
			$feed['property']['details']['sat_cable_tv_bill_inc'] = ($results[0]['sat_cable_tv_bill_inc'] == 1 ? true : false);
			$feed['property']['details']['internet_bill_inc'] = ($results[0]['internet_bill_inc'] == 1 ? true : false);
			$feed['property']['media'] = getPropertyMedia($results[0]['agent_ref']);
			$feed['property']['principal']['principal_email_address'] = $results[0]['principal_email_address'];
			$feed['property']['principal']['auto_email_updates'] = ($results[0]['auto_email_updates'] == 1 ? true : false);
			$feed['property']['principal']['auto_email_when_live'] = ($results[0]['auto_email_when_live'] == 1 ? true : false);
		}
			return $feed;
	}

	function getPropertyDetailsRemove($ref){
		$CI =& get_instance();
		$CI->db->where('agent_ref', $ref);
		$query=$CI->db->get('hoosk_property');
		$results=$query->result_array();
		$feed['network']['network_id'] = NETWORK_ID;
		$feed['branch']['branch_id'] = getRightmoveBranch($results[0]['branch_id']);
		$feed['branch']['channel'] = $results[0]['channel_id'];
		$feed['property']['agent_ref'] = $results[0]['agent_ref'];
		return $feed;
	}

	function getRightmoveBranch($branchID){
		$CI =& get_instance();
		$CI->db->where('branchID', $branchID);
		$query=$CI->db->get('hoosk_branches');
		if ($query->num_rows() > 0) {
				foreach($query->result_array() as $r){
					return $r['branchRightmoveID'];
				}
			}
	}

	function getPropertyMedia($agent_ref){
		$CI =& get_instance();
		$CI->db->where('agent_ref', $agent_ref);
		$query=$CI->db->get('hoosk_property_media');
		$media=array();
		if ($query->num_rows() > 0) {
			foreach($query->result_array() as $r){
					array_push($media,
						["media_type" => $r["media_type"],
						"media_url" => BASE_URL.$r["media_url"],
						"caption" => $r["caption"],
						"sort_order" => $r["sort_order"],
						"media_update_date" => $r["media_update_date"]]
					);
			}
			return $media;
		}
	}

?>
