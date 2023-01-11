const amount1 = document.getElementById('amount1');
const amount2 = document.getElementById('amount2');
const amount3 = document.getElementById('amount3');
const amount4 = document.getElementById('amount4');
const cost1 = document.getElementById('cost1');
const cost2 = document.getElementById('cost2');
const cost3 = document.getElementById('cost3');
const cost4 = document.getElementById('cost4');
const performance1 = document.getElementById('performance1');
const performance2 = document.getElementById('performance2');
const performance3 = document.getElementById('performance3');
const performance4 = document.getElementById('performance4');


const inputs = document.querySelectorAll('.input');
inputs.forEach(input => {
    input.addEventListener('input', emptyCheck);
})

function emptyCheck() {
    if (amount1.value !== "") {
        if (cost1.value === "") {
            cost1.classList.add('marked')
        }
        if (performance1.value === ""){
            performance1.classList.add('marked')
        }

        if (cost1.value !== "") {
            cost1.classList.remove('marked')
        }

        if (performance1.value !== ""){
            performance1.classList.remove('marked')
        }
    }

    if (amount2.value !== "") {
        if (cost2.value === "") {
            cost2.classList.add('marked')
        }
        if (performance2.value === ""){
            performance2.classList.add('marked')
        }

        if (cost2.value !== "") {
            cost2.classList.remove('marked')
        }

        if (performance2.value !== ""){
            performance2.classList.remove('marked')
        }
    }

    if (amount3.value !== "") {
        if (cost3.value === "") {
            cost3.classList.add('marked')
        }
        if (performance3.value === ""){
            performance3.classList.add('marked')
        }

        if (cost3.value !== "") {
            cost3.classList.remove('marked')
        }

        if (performance3.value !== ""){
            performance3.classList.remove('marked')
        }
    }

    if (amount4.value !== "") {
        if (cost4.value === "") {
            cost4.classList.add('marked')
        }
        if (performance4.value === ""){
            performance4.classList.add('marked')
        }

        if (cost4.value !== "") {
            cost4.classList.remove('marked')
        }

        if (performance4.value !== ""){
            performance4.classList.remove('marked')
        }
    }

    if (cost1.value !== "") {
        if (amount1.value === "") {
            amount1.classList.add('marked')
        }
        if (performance1.value === ""){
            performance1.classList.add('marked')
        }

        if (amount1.value !== "") {
            amount1.classList.remove('marked')
        }

        if (performance1.value !== ""){
            performance1.classList.remove('marked')
        }
    }

    if (cost2.value !== "") {
        if (amount2.value === "") {
            amount2.classList.add('marked')
        }
        if (performance2.value === ""){
            performance2.classList.add('marked')
        }

        if (amount2.value !== "") {
            amount2.classList.remove('marked')
        }

        if (performance2.value !== ""){
            performance2.classList.remove('marked')
        }
    }

    if (cost3.value !== "") {
        if (amount3.value === "") {
            amount3.classList.add('marked')
        }
        if (performance3.value === ""){
            performance3.classList.add('marked')
        }

        if (amount3.value !== "") {
            amount3.classList.remove('marked')
        }

        if (performance3.value !== ""){
            performance3.classList.remove('marked')
        }
    }

    if (cost4.value !== "") {
        if (amount4.value === "") {
            amount4.classList.add('marked')
        }
        if (performance4.value === ""){
            performance4.classList.add('marked')
        }

        if (amount4.value !== "") {
            amount4.classList.remove('marked')
        }

        if (performance4.value !== ""){
            performance.classList.remove('marked')
        }
    }

    if (performance1.value !== "") {
        if (cost1.value === "") {
            cost1.classList.add('marked')
        }
        if (amount1.value === ""){
            amount1.classList.add('marked')
        }

        if (cost1.value !== "") {
            cost1.classList.remove('marked')
        }

        if (amount1.value !== ""){
            amount1.classList.remove('marked')
        }
    }

    if (performance2.value !== "") {
        if (cost2.value === "") {
            cost2.classList.add('marked')
        }
        if (amount2.value === ""){
            amount2.classList.add('marked')
        }

        if (cost2.value !== "") {
            cost2.classList.remove('marked')
        }

        if (amount2.value !== ""){
            amount2.classList.remove('marked')
        }
    }

    if (performance3.value !== "") {
        if (cost3.value === "") {
            cost3.classList.add('marked')
        }
        if (amount3.value === ""){
            amount3.classList.add('marked')
        }

        if (cost3.value !== "") {
            cost3.classList.remove('marked')
        }

        if (amount3.value !== ""){
            amount3.classList.remove('marked')
        }
    }

    if (performance4.value !== "") {
        if (cost4.value === "") {
            cost4.classList.add('marked')
        }
        if (amount4.value === ""){
            amount4.classList.add('marked')
        }

        if (cost4.value !== "") {
            cost4.classList.remove('marked')
        }

        if (amount4.value !== ""){
            amount4.classList.remove('marked')
        }
    }}


inputs.forEach(input =>{
    input.addEventListener('focus', removeMarked)
})

function removeMarked(){
    if(amount1.value === "" && cost1.value === "" && performance1.value === ""){
        amount1.classList.remove('marked')
        cost1.classList.remove('marked')
        performance1.classList.remove('marked')
    }
    if(amount2.value === "" && cost2.value === "" && performance2.value === ""){
        amount2.classList.remove('marked')
        cost2.classList.remove('marked')
        performance2.classList.remove('marked')
    }
    if(amount3.value === "" && cost3.value === "" && performance3.value === ""){
        amount3.classList.remove('marked')
        cost3.classList.remove('marked')
        performance3.classList.remove('marked')
    }
    if(amount4.value === "" && cost4.value === "" && performance4.value === ""){
        amount4.classList.remove('marked')
        cost4.classList.remove('marked')
        performance4.classList.remove('marked')
    }
}

const form = document.querySelector('form');
form.addEventListener('submit', validation);

function validation(event) {
    const errorMessage = document.querySelector('.error');

    const amount1 = document.getElementById('amount1').value;
    const amount2 = document.getElementById('amount2').value;
    const amount3 = document.getElementById('amount3').value;
    const amount4 = document.getElementById('amount4').value;

    const cost1 = document.getElementById('cost1').value;
    const cost2 = document.getElementById('cost2').value;
    const cost3 = document.getElementById('cost3').value;
    const cost4 = document.getElementById('cost4').value;

    const performance1 = document.getElementById('performance1').value;
    const performance2 = document.getElementById('performance2').value;
    const performance3 = document.getElementById('performance3').value;
    const performance4 = document.getElementById('performance4').value;

    let valid = false,
        valid1 = false,
        valid2 = false,
        valid3 = false,
        valid4 = false;

    if (amount1 !== "" || amount2 !== "" || amount3 !== "" || amount4 !== "") {
        if (amount1 !== "" && cost1 !== "" && performance1 !== "" || amount1 === "" && cost1 === "" && performance1 === "") {
            valid1 = true;
        }

        if (amount2 !== "" && cost2 !== "" && performance2 !== "" || amount2 === "" && cost2 === "" && performance2 === "") {
            valid2 = true;
        }

        if (amount3 !== "" && cost3 !== "" && performance3 !== "" || amount3 === "" && cost3 === "" && performance3 === "") {
            valid3 = true;
        }

        if (amount4 !== "" && cost4 !== "" && performance4 !== "" || amount4 === "" && cost4 === "" && performance4 === "") {
            valid4 = true;
        }
    }

    valid = valid1 && valid2 && valid3 && valid4;

    if (false === valid)
/*
    if ((amount1 === "" && cost1 !== "") ||
        (amount1 !== "" && cost1 === "") ||
        (amount2 === "" && cost2 !== "") ||
        (amount2 !== "" && cost2 === "") ||
        (amount3 === "" && cost3 !== "") ||
        (amount3 !== "" && cost3 === "") ||
        (amount4 === "" && cost4 !== "") ||
        (amount4 !== "" && cost4 === "") ||
        (amount1 === "" && amount2 === "" && amount3 === "" && amount4 === "" && cost1 === "" &&
            cost2 === "" && cost3 === "" && cost4 === ""))
*/
    {
        errorMessage.textContent = "Geben Sie für einen Tankvorgang sowohl die Tankmenge als auch den Zahlbetrag ein!";
        event.preventDefault();
    }
}
