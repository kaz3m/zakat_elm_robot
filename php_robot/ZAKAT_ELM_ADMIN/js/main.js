$(document).ready(function(){


	$('body').terminal(function(command) 
	{
		var terminal = this;
		var doXhr = function(terminalInstance, url) 
		{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      //document.getElementById("demo").innerHTML =
		      var response = this.responseText;
		      terminalInstance.echo(String(response));
		    }
		  };
		  xhttp.open("GET", url, true);
		  xhttp.send();
		}
		console.log(command)
	    switch(command) 
	    {
	    	case "help":
	    	var help_string = "\n~~~~~~~🤖~~~~~~~~\n"+"List Of Available Commands: " + "\n"
	    	+"getMe: data koli dar mored robot az server telegram migirad" +
	    	"\ngetWebhook: webhook ra az server telegram migirad" + "\n" +
	    	"setWebhook: webhook ra tanzim mikonad (haman URL heroku app)" + "\n" +
	    	"unsetWebhook: webhook ra gheir faal mikonad" + "\n" +
	    	"deleteWebhook: webhook ra pak mikonad" + "\n" +
	    	"getUpdates: update ha ra migirad"+ "\n" +
	    	"log_out: az panel admin kharej mishavad" + "\n" +
	    	"help: gozineh rahnama namayesh dade mishavad" + "\n~~~~~~~🤖~~~~~~~~\n";
	    		this.echo(help_string);
	    	break;
	    	case "getWebhook":
	    		doXhr(terminal, "https://zakat-elm.herokuapp.com/getWebhook");
	    	break;
	    	case "setWebhook":
	    		doXhr(terminal, "https://zakat-elm.herokuapp.com/setWebhook");
	    	break;
	    	case "unsetWebhook":
	    		doXhr(terminal, "https://zakat-elm.herokuapp.com/unsetWebhook");
	    	break;
	    	case "deleteWebhook":
	    		doXhr(terminal, "https://zakat-elm.herokuapp.com/deleteWebhook");
	    	break;
	    	case "getUpdates":
	    		doXhr(terminal, "https://zakat-elm.herokuapp.com/getUpdates");
	    	break;
	    	case "log_out":
	    		this.echo('logging you out' + "\n" + "enjoy your time :) ");
	    		Cookies.set('admin', null);
	    		location.reload();
	    		// cookie ha ra remove kon va refresh kon page ra
	    	break;
	    	case 'getMe':
	    	var xhttp = new XMLHttpRequest();
	        xhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	               // Typical action to be performed when the document is ready:
	               console.log(typeof(xhttp.responseText) +" and length: "+ xhttp.responseText.length);
	               var response = xhttp.responseText;
	               terminal.echo(String(response));
	            }
	        };
	        xhttp.open("GET", "https://zakat-elm.herokuapp.com/getMe", true);
	        xhttp.send();
	    	break;
	    	default:
	    		this.echo('unknown command: ' + command);
	    	break;
	    }
	}, 
	{ 
		prompt: 'admin@zakat-elm.herokuapp.com ~#>_',
	 	name: 'zakat-elm_admin_terminal',
	 	width: '100%',
	 	height: '100%',
	 	greetings: 'zakat_elm_robot 🤖 Admin Terminal 🤖' + "\n" + "Lotfan baraye dideane Command Ha az *help* estefade namayeed "
	 	+ "\n•┈┈••✾ ☘ 🕊🕊🕊 ☘ ✾••┈┈•\n" + " #moshtarak_shavid \n"+
	 	"https://www.youtube.com/channel/UClyMb3gVs_X01jJoDhrChPw/about\nhttps://www.aparat.com/zakate_elm_nashr" 
	 	+"\n•┈┈••✾ ☘ 🕊🕊🕊 ☘ ✾••┈┈•\n"  
	});

});
