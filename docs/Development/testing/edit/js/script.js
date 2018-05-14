/**************************************************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
***************************************************************************************************/


jQuery(function()
{
	// Check and display all the records in the system on page load or display no record found in the case no record in the DB
	vpb_record_system('load', 'load');
});



// Add, Edit or Delete Records
function vpb_record_system(action, id)
{
	var fullname = jQuery("#fullname"+id).val() != undefined ? jQuery("#fullname"+id).val() : '';
	var email = jQuery("#email"+id).val() != undefined ? jQuery("#email"+id).val() : '';
	
	
	if( action == "add" && fullname == "" )
	{
		jQuery("#rs_status_"+action).html('Please enter your fullname to proceed');
		jQuery("#fullname"+id).focus();
		return false;
	}
	else if( action == "add" && email == "" )
	{
		jQuery("#rs_status_"+action).html('Please enter your email address to proceed');
		jQuery("#email"+id).focus()
		return false;
	}
	else
	{
		// action+'_record' turns to any of the following "add_record", "edit_record", "delete_record"
		
		var dataString = {'fullname':fullname, 'email':email, 'id':id, 'page':action+'_record'};
		
		jQuery("#rs_status_"+action).html('<img src="img/loadings.gif" align="absmiddle"  title="Loading..." />');
		
		jQuery.post('processor.php', dataString,  function(response) 
		{
			if( action == "add" ) // Results brought from the server for Add Record
			{
				jQuery("#fullname"+id).val('');
				jQuery("#email"+id).val('');
				jQuery("#rs_status_"+action).html('The record has been added successfully');
				setTimeout(function() { jQuery("#rs_status_"+action).html(''); },4000);
				vpb_record_system('load', 'load');
			}
			else if( action == "load" ) //  Results brought from the server for Load all records and display on the page on loading of the page
			{
				jQuery("#rs_status_"+action).html(response);
			}
			else if( action == "edit" ) // Results brought from the server for Edit Record
			{
				jQuery("#fn_"+id).html(fullname);
				jQuery("#em_"+id).html(email);
				
				jQuery("#rs_status_"+action).html('The record has been updated successfully');
				setTimeout(function() { jQuery("#rs_status_"+action).html(''); },2000);
				vpb_make_editable_record(id);
			}
			else // Results brought from the server for Delete the record
			{
				jQuery("#rs_status_"+action).html('');
				jQuery("#record_b_"+id).fadeOut();
				jQuery("#record_a_"+id).fadeOut();
				
				jQuery("#rs_status_"+action).html('The record has been delete successfully');
				setTimeout(function() { jQuery("#rs_status_"+action).html(''); },2000);
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_record_system('"+action+"', '"+id+"');", 1000);
		});	
	}
}





// Show or Hide editable Box
function vpb_make_editable_record(id)
{
	jQuery("#record_b_"+id+", #record_a_"+id ).toggle();
}

