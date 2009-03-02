<?php
/**
 * AJAX functionality for DokuWiki Plugin Discussion
 */

if(!count($_POST) && $HTTP_RAW_POST_DATA){
  parse_str($HTTP_RAW_POST_DATA, $_POST);
}
 
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

@require_once(DOKU_INC.'inc/init.php');
@require_once(DOKU_INC.'inc/common.php');
@require_once(DOKU_INC.'inc/plugin.php');
@require_once(DOKU_PLUGIN . 'blogtng/helper/comments.php');

$comment = new blogtng_comment();
$comment->data['text'] = $_REQUEST['text'];
$comment->data['name'] = $_REQUEST['name'];
$comment->data['mail'] = $_REQUEST['mail'];
$comment->data['web']  = ($_REQUEST['web']) ? $_REQUEST['web'] : '';
$comment->data['cid']  = 'preview';

$comment->output('default');

// vim:ts=4:sw=4:et:enc=utf-8: