<?php
/*
*Adding new meta to News Category Taxonomy 
* parameter
*	$tag =  {taxonomy-slug}_add_form_fields
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 1
*/
add_action('newscategory_add_form_fields', 'adding_meta_to_news_category', 10, 2);
function adding_meta_to_news_category($taxonomy)
{
?>
    <div class="form-field term-group">

        <label for="show_in_section">Show this category in : </label>
        <input type="checkbox" name="first_news_template" id="first_news_template" /><i font-weight="400">First News Template</i><br />
        <input type="checkbox" name="second_news_template" id="second_news_template" /><i font-weight="400">Second News Template</i><br />
    </div>

    <div class="form-field term-group">
        <input type="checkbox" name="third_news_template" id="third_news_template" /><i font-weight="400">Third News Template</i><br />
        <input type="checkbox" name="fourth_news_template" id="fourth_news_template" /><i font-weight="400">Fourth News Template</i><br />
    </div>

    <div class="form-field term-group">
        <input type="checkbox" name="fifth_news_template" id="fifth_news_template" /><i font-weight="400">Fifth News Template</i><br />
        <input type="checkbox" name="sixth_news_template" id="sixth_news_template" /><i font-weight="400">Sixth News Template</i><br />
    </div>

    <div class="form-field term-group">
        <input type="checkbox" name="seventh_news_template" id="seventh_news_template" /><i font-weight="400">Seventh News Template</i><br />
        <input type="checkbox" name="eighth_news_template" id="eighth_news_template" /><i font-weight="400">Eighth News Template</i><br />
    </div>

    <div class="form-field term-group">
        <input type="checkbox" name="nineth_news_template" id="nineth_news_template" /><i font-weight="400">Nineth News Template</i><br />
        <input type="checkbox" name="tenth_news_template" id="tenth_news_template" /><i font-weight="400">Tenth News Template</i><br />
    </div>

    <div class="form-field term-group">
        <input type="checkbox" name="eleventh_news_template" id="eleventh_news_template" /><i font-weight="400">Eleventh News Template</i><br />
        <input type="checkbox" name="twelveth_news_template" id="twelveth_news_template" /><i font-weight="400">Twelveth News Template</i><br />
    </div>
<?php
}

/*
*Saving new meta info to News Category Taxonomy 
* parameter
*	$tag =  created_{taxonomy-slug}
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/
add_action('created_newscategory', 'save_news_category_meta', 10, 2);
function save_news_category_meta($term_id, $tt_id)
{
    $first_news_template = (isset($_POST['first_news_template']) && $_POST['first_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_first_news_template', $first_news_template);

    $second_news_template = (isset($_POST['second_news_template']) && $_POST['second_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_second_news_template', $second_news_template);

    $third_news_template = (isset($_POST['third_news_template']) && $_POST['third_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_third_news_template', $third_news_template);

    $fourth_news_template = (isset($_POST['fourth_news_template']) && $_POST['fourth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_fourth_news_template', $fourth_news_template);

    $fifth_news_template = (isset($_POST['fifth_news_template']) && $_POST['fifth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_fifth_news_template', $fifth_news_template);

    $sixth_news_template = (isset($_POST['sixth_news_template']) && $_POST['sixth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_sixth_news_template', $sixth_news_template);

    $seventh_news_template = (isset($_POST['seventh_news_template']) && $_POST['seventh_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_seventh_news_template', $seventh_news_template);

    $eighth_news_template = (isset($_POST['eighth_news_template']) && $_POST['eighth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_eighth_news_template', $eighth_news_template);

    $nineth_news_template = (isset($_POST['nineth_news_template']) && $_POST['nineth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_nineth_news_template', $nineth_news_template);

    $tenth_news_template = (isset($_POST['tenth_news_template']) && $_POST['tenth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_tenth_news_template', $tenth_news_template);

    $eleventh_news_template = (isset($_POST['eleventh_news_template']) && $_POST['eleventh_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_eleventh_news_template', $eleventh_news_template);

    $twelveth_news_template = (isset($_POST['twelveth_news_template']) && $_POST['twelveth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_twelveth_news_template', $twelveth_news_template);
}
/*
*Editing new meta info to News Category Taxonomy 
* parameter
*	$tag =  {taxonomy-slug}_edit_form_fields
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/
add_action('newscategory_edit_form_fields', 'editing_meta_info_in_news_category', 10, 2);


function editing_meta_info_in_news_category($term, $taxonomy)
{
    $first_news_template = get_term_meta($term->term_id, '_first_news_template', true);
    $second_news_template = get_term_meta($term->term_id, '_second_news_template', true);

    $third_news_template = get_term_meta($term->term_id, '_third_news_template', true);
    $fourth_news_template = get_term_meta($term->term_id, '_fourth_news_template', true);

    $fifth_news_template = get_term_meta($term->term_id, '_fifth_news_template', true);
    $sixth_news_template = get_term_meta($term->term_id, '_sixth_news_template', true);

    $seventh_news_template = get_term_meta($term->term_id, '_seventh_news_template', true);
    $eighth_news_template = get_term_meta($term->term_id, '_eighth_news_template', true);

    $nineth_news_template = get_term_meta($term->term_id, '_nineth_news_template', true);
    $tenth_news_template = get_term_meta($term->term_id, '_tenth_news_template', true);

    $eleventh_news_template = get_term_meta($term->term_id, '_eleventh_news_template', true);
    $twelveth_news_template = get_term_meta($term->term_id, '_twelveth_news_template', true);

?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="feature-group">Show this category : </label>
        </th>
        <td>
            <!-- Banner Tab -->
            <i font-weight="400"><small>First News Template</small></i>
            <input type="checkbox" name="first_news_template" id="first_news_template" <?php
                                                                                        if ($first_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />
            <i font-weight="400"><small>Second News Template</small></i>
            <input type="checkbox" name="second_news_template" id="second_news_template" <?php
                                                                                            if ($second_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small class="bg-success">Third News Template</small></i>
            <input type="checkbox" name="third_news_template" id="third_news_template" <?php
                                                                                        if ($third_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />
            <i font-weight="400"><small>Fourth News Template</small></i>
            <input type="checkbox" name="fourth_news_template" id="fourth_news_template" <?php
                                                                                            if ($fourth_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small>Fifth News Template</small></i>
            <input type="checkbox" name="fifth_news_template" id="fifth_news_template" <?php
                                                                                        if ($fifth_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />
            <i font-weight="400"><small>Sixth News Template</small></i>
            <input type="checkbox" name="sixth_news_template" id="sixth_news_template" <?php
                                                                                        if ($sixth_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />


        </td>
    </tr>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="feature-group">Show this category : </label>
        </th>
        <td>
            <!-- Banner Tab -->
            <i font-weight="400"><small>Seventh News Template</small></i>
            <input type="checkbox" name="seventh_news_template" id="seventh_news_template" <?php
                                                                                            if ($seventh_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small>Eighth News Template</small></i>
            <input type="checkbox" name="eighth_news_template" id="eighth_news_template" <?php
                                                                                            if ($eighth_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small class="bg-success">Nineth News Template</small></i>
            <input type="checkbox" name="nineth_news_template" id="nineth_news_template" <?php
                                                                                            if ($nineth_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small>Tenth News Template</small></i>
            <input type="checkbox" name="tenth_news_template" id="tenth_news_template" <?php
                                                                                            if ($tenth_news_template == 1)
                                                                                                echo " checked = 'checked'";
                                                                                            else
                                                                                                echo "";
                                                                                            ?> />
            <i font-weight="400"><small>Eleventh News Template</small></i>
            <input type="checkbox" name="eleventh_news_template" id="eleventh_news_template" <?php
                                                                                        if ($eleventh_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />
            <i font-weight="400"><small>Twelveth News Template</small></i>
            <input type="checkbox" name="twelveth_news_template" id="twelveth_news_template" <?php
                                                                                        if ($twelveth_news_template == 1)
                                                                                            echo " checked = 'checked'";
                                                                                        else
                                                                                            echo "";
                                                                                        ?> />


        </td>
    </tr>




<?php
}
/*
*Saving edited meta info to News Category Taxonomy 
* parameter
*	$tag =  edited_{taxonomy-slug}
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/

add_action('edited_newscategory', 'updating_edited_news_category_meta', 10, 2);

function updating_edited_news_category_meta($term_id, $tt_id)
{
    //Banner Tab edit-update
    $first_news_template = (isset($_POST['first_news_template']) && $_POST['first_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_first_news_template', $first_news_template);

    $second_news_template = (isset($_POST['second_news_template']) && $_POST['second_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_second_news_template', $second_news_template);

    $third_news_template = (isset($_POST['third_news_template']) && $_POST['third_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_third_news_template', $third_news_template);

    $fourth_news_template = (isset($_POST['fourth_news_template']) && $_POST['fourth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_fourth_news_template', $fourth_news_template);

    $fifth_news_template = (isset($_POST['fifth_news_template']) && $_POST['fifth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_fifth_news_template', $fifth_news_template);

    $sixth_news_template = (isset($_POST['sixth_news_template']) && $_POST['sixth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_sixth_news_template', $sixth_news_template);

    $seventh_news_template = (isset($_POST['seventh_news_template']) && $_POST['seventh_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_seventh_news_template', $seventh_news_template);

    $eighth_news_template = (isset($_POST['eighth_news_template']) && $_POST['eighth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_eighth_news_template', $eighth_news_template);

    $nineth_news_template = (isset($_POST['nineth_news_template']) && $_POST['nineth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_nineth_news_template', $nineth_news_template);

    $tenth_news_template = (isset($_POST['tenth_news_template']) && $_POST['tenth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_tenth_news_template', $tenth_news_template);

    $eleventh_news_template = (isset($_POST['eleventh_news_template']) && $_POST['eleventh_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_eleventh_news_template', $eleventh_news_template);

    $twelveth_news_template = (isset($_POST['twelveth_news_template']) && $_POST['twelveth_news_template'] == 'on') ? 1 : 0;
    update_term_meta($term_id, '_twelveth_news_template', $twelveth_news_template);
}

?>