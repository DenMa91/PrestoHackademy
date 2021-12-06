let userScore= 0
let cpuScore= 0
let userScoreP= document.getElementById('user-score');
let cpuScoreP= document.getElementById('cpu-score');
let gameResult= document.getElementById('gameResult');
let rock= document.getElementById('r');
let paper= document.getElementById('p');
let scissors= document.getElementById('s');
let userBox= document.querySelector('.user-box')
let cpuBox= document.querySelector('.cpu-box')
let wrapper= document.querySelector('.wrapper')



function getComputerChoice(){
    let choices = ['r','p','s'];
    let random= Math.floor(Math.random()*3);
    return choices[random];
}

function convert(letter){
    if(letter === "r") return "Rock"
    if(letter === "p") return "Paper"
    if(letter === "s") return "Scissors"
}

function win(userChoice, computerChoice){
    userScore++;
    userScoreP.innerHTML= userScore;
    cpuScoreP.innerHTML= cpuScore;
    gameResult.innerHTML= convert(userChoice) + " beats " + convert(computerChoice) + ". You Win";
}

function lose(userChoice, computerChoice){
    cpuScore++;
    userScoreP.innerHTML= userScore;
    cpuScoreP.innerHTML= cpuScore;
    gameResult.innerHTML= convert(userChoice) + " loses to " + convert(computerChoice) + ". You Lost";
}

function draw(userChoice, computerChoice){
    userScoreP.innerHTML= userScore;
    cpuScoreP.innerHTML= cpuScore;
    gameResult.innerHTML= convert(userChoice) + " equals " + convert(computerChoice) + ". It's a Draw";
}

function game(userChoice){
    let computerChoice= getComputerChoice();
    if(computerChoice === 'r'){cpuBox.innerHTML= `<i class="far fa-hand-rock fa-3x"></i>`};
    if(computerChoice === 'p'){cpuBox.innerHTML= `<i class="far fa-hand-paper fa-3x"></i>`};
    if(computerChoice === 's'){cpuBox.innerHTML= `<i class="far fa-hand-scissors fa-3x"></i>`};
    if(userChoice === 'r'){userBox.innerHTML= `<i class="far fa-hand-rock fa-3x"></i>`};
    if(userChoice === 'p'){userBox.innerHTML= `<i class="far fa-hand-paper fa-3x"></i>`};
    if(userChoice === 's'){userBox.innerHTML= `<i class="far fa-hand-scissors fa-3x"></i>`};
    switch (userChoice + computerChoice){
        case 'rs':
        case 'pr':
        case 'sp':
            win(userChoice, computerChoice);
            break;
        case 'sr':
        case 'rp':
        case 'ps':
            lose(userChoice, computerChoice);
            break;
        case 'ss':
        case 'rr':
        case 'pp':
            draw(userChoice, computerChoice);
            break;
    }
    
}

function main(){
    
    rock.addEventListener('click', ()=>{
        game('r');
        if(userScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 mt-5 text-success">Hai vinto</h2>
            <p class="display-6 mb-5 text-success">avrai uno sconto del 10% sul tuo prossimo acquisto</p>

            <a class="btn-custom fs-2" href="/">torna alla home</a>
            `
        }else if(cpuScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 my-5 text-danger">Hai perso</h2>
            <a class="btn-custom fs-2" href="/rock-paper-scissors">prova di nuovo</a>
            `
        }
    })
    paper.addEventListener('click', ()=>{
        game('p');
        if(userScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 mt-5 text-success">Hai vinto</h2>
            <p class="display-6 mb-5 text-success">avrai uno sconto del 10% sul tuo prossimo acquisto</p>

            <a class="btn-custom fs-2" href="/">torna alla home</a>
            `
        }else if(cpuScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 my-5 text-danger">Hai Perso</h2>
            <a class="btn-custom fs-2" href="/rock-paper-scissors">prova di nuovo</a>
            `
        }
    })
    scissors.addEventListener('click', ()=>{
        game('s');
        if(userScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 mt-5 text-success">Hai vinto</h2>
            <p class="display-6 mb-5 text-success">avrai uno sconto del 10% sul tuo prossimo acquisto</p>

            <a class="btn-custom fs-2" href="/">torna alla home</a>
            `
        }else if(cpuScore==3){
            wrapper.innerHTML=
            `
            <h2 class="display-1 my-5 text-danger">Hai Perso</h2>
            <a class="btn-custom fs-2" href="/rock-paper-scissors">prova di nuovo</a>
            `
        }
    })
}


main();

