'use strict';

const blowup = (value) => {
    throw new Error('blowing up with value ' + value);
};

const process = (errorFn) => {
    const value = Math.round(Math.random() * 100, 2);
    
    if(value > 50) {
        return { value: value };
    } else {
        return errorFn(value);
    }
};
try {
    console.log(process(blowup));
} catch(ex) {
    console.log(ex.message);
}