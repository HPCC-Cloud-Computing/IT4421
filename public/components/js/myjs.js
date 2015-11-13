$(function(){
	$('.showSidebar').click(function(e){
		e.preventDefault();
		$("#main").removeClass("toggled");
	});
	$('.hideSidebar').click(function(e){
		e.preventDefault();
		$("#main").addClass("toggled");
	})
});



function loadContent(page){
  $(document).ready(function(){
    $.getJSON("/link to function",
      {format:"json"},
      function(data){
        //dosomething
      });
  });
}


// submit
function submitForm(formid){
	$(formid).submit(function(e)
		{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
	});
 
	$(formid).submit(); //Submit  the FORM
}

// Load JSON and fill to Edit Form

function editForm(pages,id){
	function DoAction( id, name )
{
    $.ajax({
         type: "POST",
         url: "url.php/",
         data: "id=" + id,
         success: function(response){
                     //show form to edit
                  }
    });
}
}
