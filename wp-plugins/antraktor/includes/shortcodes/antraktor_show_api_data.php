<?php
function antraktor_show_api_data($atts = array()) {
  $api_target = $atts['api_target'] ?? '';
  $api_query_name = $atts['api_query_name'] ?? '';
  $return_type = $atts['return_type'] ?? 'string';
  if ($api_target === '') {
    throw new Exception('api_target and api_query_name are required parameters for antraktor_show_api_data shortcode');
  }
  if ($return_type === 'string') {
    return AntraktApiCommunicator::send($api_target, $api_query_name, $atts);
  }
  throw new Exception('Not implemented yet!');
}
