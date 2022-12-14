import {
    block_greeting,
    block_information,
    block_showGame,
    block_message,
    block_result,
    block_resultText,
    block_menuGame,
    field_name,
    text_info,
    num_attempt,
    max_num,
    makeNumber,
    hidden_number,
    addNewGame,
    var_num_attempt, block_list, block_text_list
} from './Model.js';

export var userName;

export function informationOutput() {
    if (field_name.value === "") {
        alert("Enter username")
    } else {
        userName = field_name.value;

        hideAll();

        block_information.style.display = 'flex';

        text_info.innerHTML = "Great, <b>" + userName + "</b>! Let's play the game \"Guess Number\"." +
            "  I guess the number<b> from 1 to " + maxNum +
            "</b> and you have to guess the number for <b>" + num_attempt + "</b> attempts.";
    }
}
export function startGame() {
    hideAll();

    block_greeting.style.display = 'flex';
}

export function menuGame(){
    if (field_name.value === "") {
        alert("Enter username")
    } else {
    hideAll();
    block_menuGame.style.display = 'flex';
    }
}

export function showGameOutput() {
    hideAll();

    makeNumber();

    addNewGame(userName, max_num, num_attempt, hidden_number);

    block_showGame.style.display = 'flex';
}

export function messageOutput(type_message) {
    block_resultText.style.display = "flex";

    if (type_message === "less") {
        block_message.style.display = 'flex';
        block_message.innerHTML = "Your number is too small! Number of attempts: " + var_num_attempt;
    }
    if (type_message === "more") {
        block_message.style.display = 'flex';
        block_message.innerHTML = "Your number is too large! Number of attempts: " + var_num_attempt;
    }
    if (type_message === "win") {
        block_message.style.display = 'none';
        block_showGame.style.display = 'none';
        block_result.style.display = 'flex';
        block_resultText.innerHTML = "Congratulations! You guessed the number " + hidden_number +
            " c " + (num_attempt - var_num_attempt + 1) + "th attempt";
    }
    if (type_message === "loose") {
        block_message.style.display = 'none';
        block_showGame.style.display = 'none';
        block_result.style.display = 'flex';
        block_resultText.innerHTML = "Sorry, you didn't guess the number :-'('" + hidden_number;
    }
}

export function writeAllGame(result){
    hideAll();

    block_list.style.display = 'flex';
    block_text_list.innerHTML = result;
}

function hideAll(){
    block_greeting.style.display = 'none';
    block_information.style.display = 'none';
    block_showGame.style.display = 'none';
    block_message.style.display = 'none';
    block_result.style.display = 'none';
    block_menuGame.style.display = 'none';
    block_list.style.display = 'none';
}