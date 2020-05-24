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
    navigator.getUserMedia({
            video: {}
        },
        stream => {
            video.srcObject = stream
        },
        err => console.error(err)
    )
}

// Add face detection canvas
video.addEventListener("play", () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    let container = document.querySelector(".container");

    // insert canvas to container
    container.append(canvas);

    const displaySize = {
        width: video.width,
        height: video.height
    };

    faceapi.matchDimensions(canvas, displaySize);
    
    var playerEmotion;
    var playerScore;
    var intervals = setInterval(async () => {
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()


        const resizedDetections = faceapi.resizeResults(detections, displaySize)

        const getNestedObject = (nestedObj, pathArr) => {
            return pathArr.reduce((obj, key) =>
                (obj && obj[key] !== 'undefined') ? obj[key] : undefined, nestedObj);
        }

        const expressions = getNestedObject(resizedDetections, [0, 'expressions']);

        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)

        faceapi.draw.drawDetections(canvas, resizedDetections)
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
        
        if (resizedDetections[0] && Object.keys(resizedDetections[0]).length > 0 && expressions !== null & expressions!== undefined) {
            // Generate question
            const maxValue = Math.max(...Object.values(expressions));
            const emotion = Object.keys(expressions).filter(
                item => expressions[item] === maxValue
            );
            
            if(question == emotion[0]){
                score = (maxValue * 100).toFixed(1);   
                playerEmotion = emotion[0];
                playerScore = score;
                fetchResult();
            }
            else if(question !== emotion[0]) {
                score = (maxValue * 30).toFixed(1);
                playerEmotion = emotion[0];
                playerScore = score;
                fetchResult();
                
            }
            
            $("#undetect").hide();

        }
        else if(expressions == null || expressions == undefined) {
            document.getElementById("undetect").innerText = `Can't detect your face. Please reposition your face...`;
            score = 0;
            playerEmotion = 'none';
            playerScore = score;
            fetchResult();
            $("#undetect").show();
        }

    }, 100);
    
    var listEmotion = ['angry','disgusted','fearful','happy','neutral','sad','surprised']
    var question = listEmotion[Math.floor(Math.random() * listEmotion.length)];

    // Fetch score and emotion result from face detection
    function fetchResult(){
        var fetchEmotion = playerEmotion;
        var fetchplayerScore = playerScore;
        document.getElementById("myScore").innerText = `Your score is ${fetchplayerScore}`;
        document.getElementById("myEmotion").innerText = `You are now feeling ${fetchEmotion}`;
    }

    var result = document.getElementById('snapshot_result'),
    context = result.getContext('2d'),
    dataUrl='';

        // Capture
        $("#startbutton").one('click', function(){
            // Show question
            $('#startbutton').hide();
            document.getElementById("question").innerText = `Make ${question} expression`;
            
            
            setTimeout(function () {
                // dataUrl = imgUrl;
                //Pause Video
                video.pause();
                $("#undetect").hide();
                
                // Draw snapshot canvas
                context.drawImage(video, 0, 0, 630, 490);
                dataUrl = result.toDataURL("image/png");

            // Show
            $('#myScore').show();
            $('#snapshot_result').show();
            $('#playagain').show();
            $('#savebutton').show();

            // Hide
            $('#video').hide();
            
            // Get Result
            fetchResult();
            

            // stop intervals
            clearInterval(intervals);
            
        }, 6000);
    
        function progress(timeleft, timetotal, $element) {
            var progressBarWidth = timeleft * $element.width() / timetotal;
            $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft/60) + ":"+ timeleft%60);;
            if(timeleft > 0) {
                setTimeout(function() {
                    progress(timeleft - 1, timetotal, $element);
                }, 1000);
            }
        };
        
        progress(5, 5, $('#progressBar'));
        
    });
    
    $(document).one('click', '#savebutton', function (){
        var fetchEmotion = playerEmotion;
        var fetchplayerScore = playerScore;
        // console.log(dataUrl);
        $.ajax({
            type: "POST",
            url: "/../php/savepicture.php?id=<?php echo $_SESSION[$username}?>",
            data: {
                imgBase64: dataUrl,
                myScore: fetchplayerScore,
                myEmotion: fetchEmotion
           },
            success: function (data) {
                $("#seeresult").html(data);
                alert("Your image has been saved to history");
            },
            error: function () {
                alert("failure");
                $("#seeresult").html('There is error while submit');
            }
        });
        
    });
    
});

//Refresh Page
function playAgain() {
    window.location.reload();
}