$(document).ready(function(){
	
	$(".movie-image").hover(function(){
		$(this).find(".rice").show();

	},
	function()
	{
		$(this).find(".rice").hide();
	});
$(".movie-image").hover(function(){
		$(this).find(".noodle").show();

	},
	function()
	{
		$(this).find(".noodle").hide();
	});

$(".movie-image").hover(function(){
		$(this).find(".fruit").show();

	},
	function()
	{
		$(this).find(".fruit").hide();
	});
$(".movie-image").hover(function(){
		$(this).find(".fastfood").show();

	},
	function()
	{
		$(this).find(".fastfood").hide();
	});


	$(".blink").focus(function() {
            if(this.title==this.value) {
                this.value = '';
            }
        })
        .blur(function(){
            if(this.value=='') {
                this.value = this.title;                    
			}
		});
});
