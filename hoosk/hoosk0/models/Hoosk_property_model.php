<?php

class Hoosk_property_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /*     * *************************** */
    /*     * ** Log Querys ************ */
    /*     * *************************** */
    function countLog(){
          return $this->db->count_all('hoosk_rightmove_log');
      }
      function getLog($limit, $offset=0) {
          // Get a list of all pages
          $this->db->select("*");
          $this->db->order_by('logID', 'DESC');
          $this->db->limit($limit, $offset);
          $query = $this->db->get('hoosk_rightmove_log');
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }
          return array();
      }

    /*     * *************************** */
    /*     * ** Property Querys ************ */
    /*     * *************************** */




	function countProperties(){
        return $this->db->count_all('hoosk_property');
    }
    function getProperties($limit, $offset=0) {
        // Get a list of all pages
        $this->db->select("*");
        $this->db->join('hoosk_branches', 'hoosk_branches.branchID = hoosk_property.branch_id');
        $this->db->join('hoosk_property_channel', 'hoosk_property_channel.channelID = hoosk_property.channel_id');
        $this->db->join('hoosk_property_furnished', 'hoosk_property_furnished.furnishedID = hoosk_property.furnished_type');
        $this->db->join('hoosk_property_qualifier', 'hoosk_property_qualifier.qualifierID = hoosk_property.price_qualifier');
        $this->db->join('hoosk_property_rentfrequency', 'hoosk_property_rentfrequency.rentfrequencyID = hoosk_property.rent_frequency');
        $this->db->join('hoosk_property_status', 'hoosk_property_status.statusID = hoosk_property.status');
        $this->db->join('hoosk_property_lettype', 'hoosk_property_lettype.lettypeID = hoosk_property.let_type');
        $this->db->join('hoosk_property_type', 'hoosk_property_type.typeID = hoosk_property.property_type');
        $this->db->limit($limit, $offset);
        $this->db->order_by('agent_ref', 'ASC');
        $query = $this->db->get('hoosk_property');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function createProperty($file="0") {
      $timestamp = time();
        // Create the page
        $data = array(
            'agent_ref' => $this->input->post('agent_ref'),
			      'branch_id' => $this->input->post('branch_id'),
            'channel_id' => $this->input->post('channel_id'),
            'overseas' => $this->input->post('overseas'),
			      'published' => $this->input->post('published'),
            'property_type' => $this->input->post('property_type'),
            'status' => $this->input->post('status'),
			      'new_home' => $this->input->post('new_home'),
            'student_property' => $this->input->post('student_property'),
            'house_flat_share' => $this->input->post('house_flat_share'),
			      'create_date' => gmdate("d-m-Y H:i:s", $timestamp),
            'update_date' => gmdate("d-m-Y H:i:s", $timestamp),
            'date_available' => $this->input->post('date_available'),
			      'contract_months' => $this->input->post('contract_months'),
            'minimum_term' => $this->input->post('minimum_term'),
            'let_type' => $this->input->post('let_type'),
			      'house_name_number' => $this->input->post('house_name_number'),
            'address_2' => $this->input->post('address_2'),
            'address_3' => $this->input->post('address_3'),
			      'address_4' => $this->input->post('address_4'),
            'town' => $this->input->post('town'),
            'postcode_1' => $this->input->post('postcode_1'),
			      'postcode_2' => $this->input->post('postcode_2'),
            'display_address' => $this->input->post('display_address'),
            'latitude' => $this->input->post('latitude'),
			      'longitude' => $this->input->post('longitude'),
            'pov_latitude' => $this->input->post('pov_latitude'),
            'pov_longitude' => $this->input->post('pov_longitude'),
			      'pov_pitch' => $this->input->post('pov_pitch'),
            'pov_heading' => $this->input->post('pov_heading'),
            'pov_zoom' => $this->input->post('pov_zoom'),
			      'price' => $this->input->post('price'),
            'price_qualifier' => $this->input->post('price_qualifier'),
            'deposit' => $this->input->post('deposit'),
			      'administration_fee' => $this->input->post('administration_fee'),
            'rent_frequency' => $this->input->post('rent_frequency'),
            'tenure_type' => $this->input->post('tenure_type'),
            'auction' => $this->input->post('auction'),
            'tenure_unexpired_years' => $this->input->post('tenure_unexpired_years'),
            'price_per_unit_area' => $this->input->post('price_per_unit_area'),
            'price_per_unit_annum' => $this->input->post('price_per_unit_annum'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'features' => $this->input->post('features'),
            'bedrooms' => $this->input->post('bedrooms'),
            'bathrooms' => $this->input->post('bathrooms'),
            'reception_rooms' => $this->input->post('reception_rooms'),
            'furnished_type' => $this->input->post('furnished_type'),
            'pets_allowed' => $this->input->post('pets_allowed'),
            'smokers_considered' => $this->input->post('smokers_considered'),
            'housing_benefit_considered' => $this->input->post('housing_benefit_considered'),
            'sharers_considered' => $this->input->post('sharers_considered'),
            'burglar_alarm' => $this->input->post('burglar_alarm'),
            'washing_machine' => $this->input->post('washing_machine'),
            'dishwasher' => $this->input->post('dishwasher'),
            'all_bills_inc' => $this->input->post('all_bills_inc'),
            'water_bill_inc' => $this->input->post('water_bill_inc'),
            'gas_bill_inc' => $this->input->post('gas_bill_inc'),
            'electricity_bill_inc' => $this->input->post('electricity_bill_inc'),
            'oil_bill_inc' => $this->input->post('oil_bill_inc'),
            'council_tax_inc' => $this->input->post('council_tax_inc'),
            'tv_licence_inc' => $this->input->post('tv_licence_inc'),
            'sat_cable_tv_bill_inc' => $this->input->post('sat_cable_tv_bill_inc'),
            'internet_bill_inc' => $this->input->post('internet_bill_inc'),
            'business_for_sale' => $this->input->post('business_for_sale'),
            'comm_use_class' => $this->input->post('comm_use_class'),
            'principal_email_address' => $this->input->post('principal_email_address'),
            'auto_email_updates' => $this->input->post('auto_email_updates'),
            'auto_email_when_live' => $this->input->post('auto_email_when_live'),
            'notes' => $this->input->post('notes'),
        );
        $this->db->insert('hoosk_property', $data);

        $images = explode('{', $this->input->post('pics'));
        $timestamp = time();
        for($i=1;$i<count($images);$i++)
        {
          $div = explode('|', $images[$i]);

          $imagedata = array(
            'agent_ref' => $this->input->post('agent_ref'),
            'media_type' => 1,
            'media_url' => $div[0],
            'caption' => substr($div[1],0,-1),
            'sort_order' => $i,
            'media_update_date' => gmdate("d-m-Y H:i:s", $timestamp),
          );

          $this->db->insert('hoosk_property_media', $imagedata);
        }
        if ($file!="0"){
          $imagedata = array(
            'agent_ref' => $this->input->post('agent_ref'),
            'media_type' => 3,
            'media_url' => $file,
            'caption' => "",
            'sort_order' => 1,
            'media_update_date' => gmdate("d-m-Y H:i:s", $timestamp),
          );
          $this->db->insert('hoosk_property_media', $imagedata);
        }
    }

    function getProperty($id) {
        // Get the page details
        $this->db->select("*");
        $this->db->join('hoosk_property_channel', 'hoosk_property_channel.channelID = hoosk_property.channel_id');
        $this->db->join('hoosk_property_furnished', 'hoosk_property_furnished.furnishedID = hoosk_property.furnished_type');
        $this->db->join('hoosk_property_qualifier', 'hoosk_property_qualifier.qualifierID = hoosk_property.price_qualifier');
        $this->db->join('hoosk_property_rentfrequency', 'hoosk_property_rentfrequency.rentfrequencyID = hoosk_property.rent_frequency');
        $this->db->join('hoosk_property_status', 'hoosk_property_status.statusID = hoosk_property.status');
        $this->db->join('hoosk_property_lettype', 'hoosk_property_lettype.lettypeID = hoosk_property.let_type');
        $this->db->join('hoosk_property_type', 'hoosk_property_type.typeID = hoosk_property.property_type');
        $this->db->where('agent_ref', $id);
        $query = $this->db->get('hoosk_property');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getPropertyImages($id){
      $this->db->select("*");
      $this->db->where('agent_ref', $id);
      $this->db->where('media_type', 1);
      $this->db->order_by('mediaID', 'ASC');
      $query = $this->db->get('hoosk_property_media');
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
      return array();
    }
    function removeProperty($id) {
        // Delete a property
        $this->db->delete('hoosk_property', array('agent_ref' => $id));
        $this->db->select("*");
        $this->db->where('agent_ref', $id);
        $query = $this->db->get('hoosk_property_media');
        if ($query->num_rows() > 0) {
          foreach($query->result_array() as $c):
               unlink(DIRPATH.$c['media_url']);
          endforeach;
        }
        $this->db->delete('hoosk_property_media', array('agent_ref' => $id));
    }


    function updateProperty($id, $file="0") {
      $timestamp = time();
        // Update the page
        $data = array(
          'overseas' => $this->input->post('overseas'),
          'published' => $this->input->post('published'),
          'property_type' => $this->input->post('property_type'),
          'status' => $this->input->post('status'),
          'new_home' => $this->input->post('new_home'),
          'student_property' => $this->input->post('student_property'),
          'house_flat_share' => $this->input->post('house_flat_share'),
          'update_date' => gmdate("d-m-Y H:i:s", $timestamp),
          'date_available' => $this->input->post('date_available'),
          'contract_months' => $this->input->post('contract_months'),
          'minimum_term' => $this->input->post('minimum_term'),
          'let_type' => $this->input->post('let_type'),
          'house_name_number' => $this->input->post('house_name_number'),
          'address_2' => $this->input->post('address_2'),
          'address_3' => $this->input->post('address_3'),
          'address_4' => $this->input->post('address_4'),
          'town' => $this->input->post('town'),
          'postcode_1' => $this->input->post('postcode_1'),
          'postcode_2' => $this->input->post('postcode_2'),
          'display_address' => $this->input->post('display_address'),
          'latitude' => $this->input->post('latitude'),
          'longitude' => $this->input->post('longitude'),
          'pov_latitude' => $this->input->post('pov_latitude'),
          'pov_longitude' => $this->input->post('pov_longitude'),
          'pov_pitch' => $this->input->post('pov_pitch'),
          'pov_heading' => $this->input->post('pov_heading'),
          'pov_zoom' => $this->input->post('pov_zoom'),
          'price' => $this->input->post('price'),
          'price_qualifier' => $this->input->post('price_qualifier'),
          'deposit' => $this->input->post('deposit'),
          'administration_fee' => $this->input->post('administration_fee'),
          'rent_frequency' => $this->input->post('rent_frequency'),
          'tenure_type' => $this->input->post('tenure_type'),
          'auction' => $this->input->post('auction'),
          'tenure_unexpired_years' => $this->input->post('tenure_unexpired_years'),
          'price_per_unit_area' => $this->input->post('price_per_unit_area'),
          'price_per_unit_annum' => $this->input->post('price_per_unit_annum'),
          'summary' => $this->input->post('summary'),
          'description' => $this->input->post('description'),
          'features' => $this->input->post('features'),
          'bedrooms' => $this->input->post('bedrooms'),
          'bathrooms' => $this->input->post('bathrooms'),
          'reception_rooms' => $this->input->post('reception_rooms'),
          'furnished_type' => $this->input->post('furnished_type'),
          'pets_allowed' => $this->input->post('pets_allowed'),
          'smokers_considered' => $this->input->post('smokers_considered'),
          'housing_benefit_considered' => $this->input->post('housing_benefit_considered'),
          'sharers_considered' => $this->input->post('sharers_considered'),
          'burglar_alarm' => $this->input->post('burglar_alarm'),
          'washing_machine' => $this->input->post('washing_machine'),
          'dishwasher' => $this->input->post('dishwasher'),
          'all_bills_inc' => $this->input->post('all_bills_inc'),
          'water_bill_inc' => $this->input->post('water_bill_inc'),
          'gas_bill_inc' => $this->input->post('gas_bill_inc'),
          'electricity_bill_inc' => $this->input->post('electricity_bill_inc'),
          'oil_bill_inc' => $this->input->post('oil_bill_inc'),
          'council_tax_inc' => $this->input->post('council_tax_inc'),
          'tv_licence_inc' => $this->input->post('tv_licence_inc'),
          'sat_cable_tv_bill_inc' => $this->input->post('sat_cable_tv_bill_inc'),
          'internet_bill_inc' => $this->input->post('internet_bill_inc'),
          'business_for_sale' => $this->input->post('business_for_sale'),
          'comm_use_class' => $this->input->post('comm_use_class'),
          'principal_email_address' => $this->input->post('principal_email_address'),
          'auto_email_updates' => $this->input->post('auto_email_updates'),
          'auto_email_when_live' => $this->input->post('auto_email_when_live'),
          'notes' => $this->input->post('notes'),
        );

        $this->db->where("agent_ref", $id);
        $this->db->update('hoosk_property', $data);

        $this->db->delete('hoosk_property_media', array('agent_ref' => $id));
        $images = explode('{', $this->input->post('pics'));
        $timestamp = time();
    		for($i=1;$i<count($images);$i++)
    		{
    			$div = explode('|', $images[$i]);

    			$imagedata = array(
    				'agent_ref' => $id,
            'media_type' => 1,
    				'media_url' => $div[0],
    				'caption' => substr($div[1],0,-1),
    				'sort_order' => $i,
            'media_update_date' => gmdate("d-m-Y H:i:s", $timestamp),
    			);

    			$this->db->insert('hoosk_property_media', $imagedata);
    		}

        if ($file!="0"){
          $imagedata = array(
            'agent_ref' => $id,
            'media_type' => 3,
            'media_url' => $file,
            'caption' => "",
            'sort_order' => 1,
            'media_update_date' => gmdate("d-m-Y H:i:s", $timestamp),
          );
          $this->db->insert('hoosk_property_media', $imagedata);
        } else if($_POST['PDFUpload']!="") {
          $imagedata = array(
            'agent_ref' => $id,
            'media_type' => 3,
            'media_url' => $this->input->post('PDFUpload'),
            'caption' => "",
            'sort_order' => 1,
            'media_update_date' => gmdate("d-m-Y H:i:s", $timestamp),
          );
          $this->db->insert('hoosk_property_media', $imagedata);
        }

    }


    function storeResponse($code,$status,$protocol,$result){
      $data = array(
        'status_code' => $code,
        'reason_phrase' => $status,
        'protocol_ver' => $protocol,
        'message' => $result['message'],
        'error_code' => $result['errors'][0]['error_code'],
        'error_value' => $result['errors'][0]['error_value'],
        'error_description' => $result['errors'][0]['error_description'],
        'request_timestamp' => $result['request_timestamp'],
        'response_timestamp' => $result['response_timestamp'],
        'request_id' => $result['request_id'],
        'agent_ref' =>$result['property']['agent_ref'],
        'change_type' => $result['property']['change_type'],
        'rightmove_id' =>$result['property']['rightmove_id'],
        'rightmove_url' => $result['property']['rightmove_url'],
      );
      $this->db->insert('hoosk_rightmove_log', $data);

    }
  function rightmoveSuccess($result){
    $data2 = array(
      'rightmove_url' =>$result['property']['rightmove_url'],
      'rightmoveStatus' =>1,
    );
    $this->db->where("agent_ref", $result['property']['agent_ref']);
    $this->db->update('hoosk_property', $data2);
  }
    /************************/
    /*** Branch functions ***/
    /************************/

    function countBranches(){
          return $this->db->count_all('hoosk_branches');
      }
      function getBranches($limit, $offset=0) {
          // Get a list of all pages
          $this->db->select("*");
          $this->db->limit($limit, $offset);
          $query = $this->db->get('hoosk_branches');
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }
          return array();
      }

      function createBranch() {
          // Create the page
          $data = array(
              'branchName' => $this->input->post('branchName'),
              'branchURL' => $this->input->post('branchURL'),
              'branchAddress' => $this->input->post('branchAddress'),
              'branchTelephone' => $this->input->post('branchTelephone'),
              'branchEmail' => $this->input->post('branchEmail'),
              'branchImage' => $this->input->post('branchImage'),
              'branchRightmoveID' => $this->input->post('branchRightmoveID'),
          );
          $this->db->insert('hoosk_branches', $data);
      }

      function getBranch($id) {
          // Get the page details
          $this->db->select("*");
          $this->db->where('branchID', $id);
          $query = $this->db->get('hoosk_branches');
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }
          return array();
      }


      function removeBranch($id) {
          // Delete a page
          $this->db->delete('hoosk_branches', array('branchID' => $id));
      }


      function updateBranch($id) {
          // Update the page
          $data = array(
            'branchName' => $this->input->post('branchName'),
            'branchURL' => $this->input->post('branchURL'),
            'branchAddress' => $this->input->post('branchAddress'),
            'branchTelephone' => $this->input->post('branchTelephone'),
            'branchEmail' => $this->input->post('branchEmail'),
            'branchImage' => $this->input->post('branchImage'),
            'branchRightmoveID' => $this->input->post('branchRightmoveID'),
          );
          $this->db->where("branchID", $id);
          $this->db->update('hoosk_branches', $data);
      }
}
?>
