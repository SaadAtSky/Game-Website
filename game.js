/*Variable declaration*/
let score = -4;
let myScore = document.getElementById("myCounter");
let myCanvas = document.getElementById("myCanvas");
let context = myCanvas.getContext("2d");
let enemy = document.getElementById("coronavirus");
let character = document.getElementById("character");
let audio = new Audio('audio.mp3');

/*Function to count score and run the game*/
setInterval(increaseScore, 1000);
let gameInterval = setInterval(gameplay, 10);

/*Background audio and rules prompt*/
audio.play();
window.onload = alert("Press SPACEBAR to avoid incoming coronaviruses. Mask gives extra points");

/*Jump animation*/
function jump() {
    if (character.classList == "animate") { return }
    character.classList.add("animate");
    setTimeout(function () {
        character.classList.remove("animate");
    }, 300);
}

/*Basic functionality of the game such as jump, storing top scores, checking for contact with mask and checking for game over */
function gameplay() {
    drawLine();
    
    /*Associate Jump animation with SPACEBAR*/
    window.onkeydown = event => {
        console.log(event);
        if (event.keyCode == 32) {
            jump();
        }
    }
    if (overlaps(character, mask)) {
        score = score + 1;
    }
    if (overlaps(character, coronavirus)) {
        clearInterval(gameInterval);
        let email;
        
        /*Extract key of logged in user*/
        for (let key of Object.keys(localStorage)) {
            let user = JSON.parse(localStorage[key]);
            if (user.loggedIn === true) {
                email = user.email;
            }
        }
        let usr = JSON.parse(localStorage[email]);
        alert("Game Over " + usr.username + ". Your score was: " + score);
        
        /*Update top score of logged in user*/
        if (score > usr.topScore) {
            usr.topScore = score;
        }
        localStorage[usr.email] = JSON.stringify(usr);
        window.open("http://localhost/leaderboard.php", "_self");
        score = 0;
    }
}

/*Draw the line on which the characters stand*/
function drawLine() {
    context.fillStyle = "black";
    context.fillRect(0, 130, 1000, 1);
}

/* increment score*/
function increaseScore() {
    score++;
    myScore.innerHTML = "Score: " + score;
}

/* Function to check if two objects overlap*/
let overlaps = (function () {
    function getPositions(elem) {
        let pos, width, height;
        pos = $(elem).position();
        width = $(elem).width() / 2;
        height = $(elem).height();
        return [[pos.left, pos.left + width], [pos.top, pos.top + height]];
    }

    function comparePositions(p1, p2) {
        let r1, r2;
        r1 = p1[0] < p2[0] ? p1 : p2;
        r2 = p1[0] < p2[0] ? p2 : p1;
        return r1[1] > r2[0] || r1[0] === r2[0];
    }

    return function (a, b) {
        let pos1 = getPositions(a),
            pos2 = getPositions(b);
        return comparePositions(pos1[0], pos2[0]) && comparePositions(pos1[1], pos2[1]);
    };
})();