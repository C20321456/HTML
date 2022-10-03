const students = [
    {
        name: "Anna",
        sex: "f",
        grades: [4.5, 3.5, 4]
    },
    {
        name: "Dennis",
        sex: "m",
        country: "Germany",
        grades: [5, 1.5, 4]
    },
    {
        name: "Martha",
        sex: "f",
        grades: [5, 4, 2.5, 3]
    },
    {
        name: "Brock",
        sex: "m",
        grades: [4, 3, 2]
    }
];

let femaleStudents = students.filter(({ sex }) => sex >= "f").map(({ name }) => name, ({ sex }) => sex, ({ grades }) => grades);

console.log("Females Results: ");
console.log(femaleStudents);


function checkSex(student){
    students.filter(({ sex }) => sex >= "f")
}

function graveAverage(student){
    let grade1 = student.grades[0];
    let grade2 = student.grades[1];
    let grade3 = student.grades[2];
    let avrg = grade1 + grade2 + grade3 / 3;

    console.log("Name of female: ", student.name)
    console.log("The average is: ", avrg);
    return avrg;
}