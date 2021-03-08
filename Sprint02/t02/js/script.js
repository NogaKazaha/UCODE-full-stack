let animalName;
let gender;
let age;

animalName = prompt("What animal is the superhero most similar to?");
if (animalName.length <= 20 && !animalName.includes(" ") && animalName !== "") {
  gender = prompt("Is the superhero male or female? Leave blank if unknown or other.");
    if (gender === "male" || gender === "female" || gender === "") {
      age = prompt("How old is the superhero?");
        if (age.length <= 5 && age > 0) {
          if (gender.match(/male/gmi) && age < 18) {
            status = "boy";
          }
          if (gender.match(/male/gmi) && age >= 18) {
            status = "man";
          }
          if (gender.match(/female/gmi) && age < 18) {
            status = "girl";
          }
          if (gender.match(/female/gmi) && age >= 18) {
            status = "woman";
          }
          if (gender === "" && age <18) {
            status = "kid";
          }
          if (gender === "" && age >= 18) {
            status = "hero";
          }
          const result = "The superhero name is: " + animalName.toLowerCase() + "-" + status + "!";
          alert(result);
        } 
        else {
          alert("Wrong input!");
        }
    } 
    else {
      alert("Wrong input!");
    }
}
else {
  alert("Wrong input!");
}