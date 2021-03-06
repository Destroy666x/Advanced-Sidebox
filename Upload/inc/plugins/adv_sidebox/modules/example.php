<?php
/*
 * Advanced Sidebox Add-On Example #1
 *
 * This is an example of the simplest version of an Advanced Sidebox add-on.
 */

// Include a check for Advanced Sidebox
if(!defined("IN_MYBB") || !defined("ADV_SIDEBOX"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

function example_asb_info()
{
	return array
	(
		"name"				=>	'[Example 1] Simplest Box',
		"description"		=>	'As simple as it gets. This box illustrates the easiest way to create an addon module',
		"wrap_content"	=>	true,
		"version"				=>	"1"
	);
}

// this function is called when it is time to display your box
function example_asb_build_template($settings, $template_var)
{
	/*
	 * using variable variables (thanks Euan T.) we declare the template variable as global here and eval() its contents.
	 */
	global $$template_var; //<-- this is necessary

	/*
	 * set any variables in your template (or string as in this case) here just before the eval()
	 *
	 * note the structure, this content should appropriate (and validate) as the contents of an HTML <tbody> element in structure and content.
	 */
	$hello_world = '
					<tr>
						<td class=\"trow1\">Same from either side.</td>
					</tr>';

	// then we will set the modules template variable by eval()ing its contents to the variable we declared global above
	eval("\$" . $template_var . " = \"" . $hello_world . "\";");

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>
