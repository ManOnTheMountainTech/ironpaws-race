<?php
    defined( 'ABSPATH' ) || exit;

    namespace IronPaws;
    
    function val_or_zero_int(INT $var) {
        return (isset($var) ? ($var) : 0);
    }

    function val_or_zero_array($var_name, array $array) {
        return array_key_exists($var_name, $array) ? $array[$var_name] : 0;
    }

    function makeHTMLErrorMessage($error_msg) {
        return "<p>$error_msg</p>";
    }

    // makes a string like "id=blah" name="blah" value="foo"
    // @param: string $id -> The identifier
    // @param: string $value -> What the user will see
    // @returns: string -> ready to use html select entry
    function makeHTMLIdString(string $id, string $value) {
      return <<<MAKE_HTML_ID
        "id={$id}" "name={$value}" "value={$value}"
      MAKE_HTML_ID;
    }

    function makeHTMLInputString(string $input_type, string $id, string $value) {
      return '<input type=' . $input_type . ' ' . makeHTMLIdString($id, $value) . ">\n";
    }

    function makeHTMLOptionString(string $value, string $description) {
      $str = <<<FORM_OPTION
        <option value="{$value}">{$description}</option>
    FORM_OPTION;

      return $str . "\n";
    }

      // Processes get args to wc customer params
  // @return: The musher name in first and last format
  function makeWCParamsFromFirstLast() {
    if (isset($_GET[FIRST_NAME]) && isset($_GET[LAST_NAME])) {
      $first_name = $_SESSION[FIRST_NAME] = sanitize_text_field($_GET[FIRST_NAME]);
      $last_name = $_SESSION[LAST_NAME] = sanitize_text_field($_GET[LAST_NAME]);

      if (('' == $first_name) || ('' == $last_name)) {
        throw new Exception(FORM_INCOMPLETE_MSG, FORM_INCOMPLETE_ERROR);
      }

      $params = array('first_name' => $first_name, 
      'last_name' => $last_name, 
        'role' => 'all');
    } else {
      throw new Exception(FORM_INCOMPLETE_MSG, FORM_INCOMPLETE_ERROR);
    }

    return $params;
  }
?>