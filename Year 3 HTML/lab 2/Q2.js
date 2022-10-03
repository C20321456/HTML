'use strict';
const numbers = [1, 5, 2, 6, 8, 3, 4, 9, 7, 6];

let totalOfDoubleOfEven = 0;

numbers.filter(modulo).forEach(storedNumber);

function modulo(number) {
    if(number % 2 === 0) {
        return number; 
    }
}
function storedNumber(number) {
    totalOfDoubleOfEven += number * 2;
}

console.log(totalOfDoubleOfEven);