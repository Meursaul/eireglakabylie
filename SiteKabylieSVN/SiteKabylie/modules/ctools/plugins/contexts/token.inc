<?php
// $Id: token.inc,v 1.2 2010/10/11 22:18:23 sdboyer Exp $

/**
 * @file
 *  Provide a global context to allow for token support.
 */

if (module_exists('token')) {
  $plugin = array(
    'title' => t('Token'),
    'description' => t('A context that contains token replacements from token.module.'),
    'no ui' => TRUE,
    'context' => 'ctools_context_create_token',  // func to create context
    'context name' => 'token',
    'keyword' => 'token',
    'convert list' => 'ctools_context_token_convert_list',
    'convert' => 'ctools_context_token_convert',
  );
}

/**
 * Create a context from manual configuration.
 */
function ctools_context_create_token($empty, $data = NULL, $conf = FALSE) {
  $context = new ctools_context('token');
  $context->plugin = 'token';

  return $context;
}

/**
 * Implementation of hook_ctools_context_convert_list().
 */
function ctools_context_token_convert_list() {
  // Pass everything through to token_get_list().
  return reset(token_get_list(array('global')));
}

/**
 * Implementation of hook_ctools_context_converter_alter().
 */
function ctools_context_token_convert($context, $token) {
  $values = token_get_values();
  $key = array_search($token, $values->tokens);
  if ($key !== FALSE) {
    return $values->values[$key];
  }
}