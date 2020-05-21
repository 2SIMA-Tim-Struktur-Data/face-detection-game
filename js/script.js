const video = document.getElementById('video');

// Hide unnecessary
$('#playagain').hide();
$('#savebutton').hide();
$('#snapshot_result').hide();


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
            document.getElementById("myEmotion").innerText = `You are now feeling ${emotion[0]}`;
            document.getElementById("myScore").innerText = `Your score is ${score}`

        }

    }, 100);

});


$(document).ready(function () {
    // Declare Global Variable
    var result = document.getElementById('snapshot_result'),
    context = result.getContext('2d'),
    dataUrl = result.toDataURL("image/png");

    // Capture Image
    $(document).on('click', '#startbutton', function () {
        //Pause Video
        // video.pause();
        
        // Draw snapshot canvas
        context.drawImage(video, 0, 0, 720, 560);

        //Hide startbutton and show playagain
        $('#playagain').show();
        $('#savebutton').show();
        $('#startbutton').hide();


        // Show snapshot and hide video
        $('#video').hide();
        $('#snapshot_result').show();


    });
    // Send File
    $(document).one('click', '#savebutton', function () {
        $.ajax({
            type: "POST",
            url: "/../php/savepicture.php?id=<?php echo $_SESSION[$username}?>",
            data: {
                imgBase64: dataUrl, // image
           },
            success: function (data) {
                console.log(data);
                $("#seeresult").html(data);
            },
            error: function () {
                alert("failure");
                $("#seeresult").html('There is error while submit');
            }
        }).done(function(msg) {
            console.log("saved");
        });
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