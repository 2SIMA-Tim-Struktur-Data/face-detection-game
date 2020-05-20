const video = document.getElementById('video');

// Include face detection api
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('/models')
]).then(startVideo);

// Start video function
function startVideo() {
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

    navigator.getUserMedia({
            video: true,
            audio: false
        }, stream => video.srcObject = stream,
        err => console.error(err)
    );

}

// Add face detection canvas
video.addEventListener("play", () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    let container = document.querySelector(".container");
    
    // document.body.append(canvas)
    container.append(canvas);

    const displaySize = {
        width: video.width,
        height: video.height
    };

    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
        const detectionsFace = await faceapi
            .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceExpressions()
        const resizedDetections = faceapi.resizeResults(detectionsFace, displaySize)
        console.log(resizedDetections);

        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);

        faceapi.draw.drawDetections(canvas, resizedDetections);
        // faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        // faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

        const expressions = resizedDetections.expressions;
        const maxValue = Math.max(...Object.values(expressions));
        const emotion = Object.keys(expressions).filter(
            item => expressions[item] === maxValue
        );
        const score = (maxValue * 100).toFixed(1);
        
        if (resizedDetections && Object.keys(resizedDetections).length > 0) {
            // Generate question
            document.getElementById("emotion").innerText = `You are now feeling ${emotion[0]}`;
            document.getElementById("score").innerText = `Your score is ${score}`
            
        }
        
    }, 100);
    
})

// Capture image
$('#playagain').hide();
$('#savebutton').hide();
$('#snapshot_result').hide();

$(document).ready(function () {
    $(document).on('click', '#startbutton', function () {
        var result = document.getElementById('snapshot_result'),
            context = result.getContext('2d'),
            dataURL = result.toDataURL("image/png", 0.85);

        //Pause Video
        // video.pause();

        //Hide startbutton and show playagain
        $('#playagain').show();
        $('#savebutton').show();
        $('#startbutton').hide();

        // Draw snapshot canvas
        context.drawImage(video, 0, 0, 720, 560);
        
        // Show snapshot and hide video
        $('#video').hide();
        $('#snapshot_result').show();

        // Send File
        $.ajax({
            type: "POST",
            url: "/../php/ajaxUpload.php",
            data: {
                photo: dataURL, // image
                username: "<?php echo ($_SESSION['user_id']); ?>"

            },
            success: function(data){
                $("#seeresult").html('Submitted successfully' + data);
            },
            error:function(){
                alert("failure");
                $("#seeresult").html('There is error while submit');
            }
        });
        // .done(function (o) {  // success function 
        //     alert("Photo Saved Successfully!");
        // });
        //e.preventDefault();
        //var data = $(this).serialize();
    });

});


//Refresh Page
function playAgain() {
    window.location.reload();
}

// $(document).on('click', '#playagain', function () {
//     $("#video").show();
//     $("#snapshot_result").hide();
//     $("#startbutton").show();
//     $("#playagain").hide();
// });
// startbutton.addEventListener('click', function(ev) {
//     if(startbutton.innerText==="CAPTURE")
//   {
//       takepicture();
//   }
//   else
//   {
//     startbutton.innerText= "CAPTURE";
//   }
//   ev.preventDefault();
// }, false);
