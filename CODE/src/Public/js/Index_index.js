$(document).ready(function(){
			$("#logout").click(function(){
					window.location.href="../Index/logout";
				});
			});

$(document).ready(function(){
			$("#viewMessage").click(function(){
				window.location.href="../Message/viewMessage";
				});
			});

var t = setTimeout("checkMessage()",3000);
function checkMessage()
{
	$.get("../Message/checkMessage",function(data,status){
		if(data == 1)
			$("#p_new_message").fadeIn();
		else
			$("#p_new_message").fadeOut();
		});
	t = setTimeout("checkMessage()",3000);
}

$(document).ready(function(){
			$("#viewRankingList").click(function(){
				window.location.href="../Ranking/viewRankingList";
				});
			});

function activate_task_toggle(task_list_number)
{
	for(i = 0 ; i < task_list_number ; i ++)
	{
		$(".task_toggle" + i).click((function(j)
			{
				return function()
				{
					$(".task_info" + j).slideToggle();
				}
			})(i));
	}
}

function activate_user_toggle(user_list_number)
{
	for(i = 0 ; i < user_list_number ; i ++)
	{
		$(".user_toggle" + i).click((function(j)
			{
				return function()
				{
					$(".user_info" + j).slideToggle();
				}
			})(i));
	}
}

function activate_message_toggle(message_list_number)
{
	for(i = 0 ; i < message_list_number ; i ++)
	{
		$(".message_toggle" + i).click((function(j)
			{
				return function()
				{
					$(".message_info" + j).slideToggle();
				}
			})(i));
	}
}

function activate_ranking_toggle(ranking_list_number)
{
	for(i = 0 ; i < ranking_list_number ; i ++)
	{
		$(".ranking_toggle" + i).click((function(j)
			{
				return function()
				{
					$(".ranking_info" + j).slideToggle();
				}
			})(i));
	}
}

function hide_task_list(task_list_number){
	for(i = 0 ; i < task_list_number ; i ++)
	{
		$(".task_info" + i).css("display","None");
	}
}

function hide_user_list(task_user_number){
	for(i = 0 ; i < task_user_number ; i ++)
	{
		$(".user_info" + i).css("display","None");
	}
}

function hide_message_list(message_list_number){
	for(i = 0 ; i < message_list_number ; i ++)
	{
		$(".message_info" + i).css("display","None");
	}
}

function hide_ranking_list(ranking_list_number){
	for(i = 0 ; i < ranking_list_number ; i ++)
	{
		$(".ranking_info" + i).css("display","None");
	}
}

function init_list(task_list_number,user_list_number,message_list_number,ranking_list_number,panel)
{
	activate_task_toggle(task_list_number);
	activate_user_toggle(user_list_number);
	activate_message_toggle(message_list_number);
	activate_ranking_toggle(ranking_list_number);
	hide_task_list(task_list_number);
	hide_user_list(user_list_number);
	hide_message_list(message_list_number);
	hide_ranking_list(ranking_list_number);
	$(".list_div").hide();
	if(panel == "poseTask")
		$(".poseTask_div").slideDown('slow');
	else if(panel == "viewTask")
		$(".task_div").slideDown('slow');
	else if(panel == "searchUser")
		$(".user_div").slideDown('slow');
	else if(panel == "message")
		$(".message_div").slideDown('slow');
	else if(panel == "ranking")
		$(".ranking_div").slideDown('slow');
	else if(panel == "submiss")
		$(".submiss_div").slideDown('slow');
	else if(panel == "feedback")
		$(".feedback_div").slideDown('slow');
	else if(panel == "index")
		$(".index_div").show();
		
		

		
}

$(document).ready(function(){
		$("#submiss").click(function(){
			window.location.href="../Submiss/submissForm";
			});
		});

$(document).ready(function(){
		$("#index").click(function(){
			window.location.href="../Index/index";
			});
		});

$(document).ready(function(){
		$(".displayViewTaskForm").click(function(){
			window.location.href="../Task/viewTaskForm";
			});

		$(".displayPoseTaskForm").click(function(){
			window.location.href="../Task/poseTaskForm";
			});

		$(".displaySearchUserForm").click(function(){
			window.location.href="../Task/searchUserForm"
			});

		$(".displayMessageForm").click(function(){
			window.location.href="../Message/viewMessage";
			});

		$(".displayRankingForm").click(function(){
			window.location.href="../Ranking/viewRankingList";
			});

		$(".displaySubmissForm").click(function(){
			window.location.href="../Submiss/submissForm";
			});

		$(".displayFeedbackForm").click(function(){
			window.location.href="../Feedback/feedbackForm";
			});

		});

