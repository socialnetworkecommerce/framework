$( document ).ready(function(){
    const video = document.querySelector('video');

    const btnLogin = document.querySelector("#btnLogin");

    const constraint = {

        video : true
    };

    
    navigator.mediaDevices.getUserMedia(constraint).then((stream) => {video.srcObject = stream});


    $("#btnLogin").click(function(evt)
    {
    	capture();

    	evt.preventDefault();
    });
});



function capture()
{
	const canvas = document.querySelector('canvas');
	const image = document.querySelector('#image');

	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	canvas.getContext('2d').drawImage(video, 0, 0);

	image.src = canvas.toDataURL('image/png');

	$("#send_image").val(canvas.toDataURL('image/png'));

	$.ajax({
		method: "POST",
		url: get_url('/employee/login'),
		data:{userid: $("#userid").val() , image:$("#send_image").val()},

		success:function(response){
			
			let returnData = JSON.parse(response);
			
			if(returnData.message == 'Error on database')
			{
				console.log('an error occured');
			}

			if(returnData.message == 'redirect to panel')
			{
				window.location = get_url('timeKeeping/userPanel/'+returnData.userid);
			}
			
			if(returnData.message == 'redirect to login')
			{
				window.location = get_url('timeKeeper/');
			}
			
		}
	});
	// login($("#to_send_image").val());
}