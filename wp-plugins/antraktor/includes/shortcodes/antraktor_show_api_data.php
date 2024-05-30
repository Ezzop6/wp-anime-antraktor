<?php
function antraktor_show_api_data($atts = array()) {
  $api_target = $atts['api_target'] ?? '';
  $api_query_name = $atts['api_query_name'] ?? ''; // querry name :) 
  return this_function($api_target, $api_query_name);
}

function this_function($api_target, $api_query_name) {
  return AntraktApiCommunicator::send($api_target, $api_query_name);
}
