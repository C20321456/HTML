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

let femaleStudents = students.filter(checkSex);
graveAverage(femaleStudents[0]);
graveAverage(femaleStudents[1]);
console.log(femaleStudents);


function checkSex(student){
    if (student.sex === "f") {
        return student
    }
}

function graveAverage(student){
    let average = 0;
    const results = [];

    for(let i=0; i<student.grades.length; i++){
        average = average + student.grades[i];

        if(i === (student.grades.length) -1){
            average = average/(i+1);
        }
    }

    student.grades[0]= average;

    student.grades.length=1;
    return student;
}