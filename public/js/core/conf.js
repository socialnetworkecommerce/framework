const URL = 'http://acme.socialnetwork';

const DS  = '/';

function get_url(called_url = null){

	if(called_url != null) {

		return URL+DS+called_url;
	}

	else{
		return URL;
	}
	
}


