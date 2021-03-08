let first_name = prompt('Enter your first name');
let last_name = prompt ('Enter your last name');
if (first_name.match(/^[A-Za-z]+$/) && last_name.match(/^[A-Za-z]+$/)) {
  let firstName = first_name[0].toUpperCase() + (first_name.slice(1)).toLowerCase();
  let lastName = last_name[0].toUpperCase() + (last_name.slice(1)).toLowerCase();
  console.log('Greetings ' + firstName + ' ' + lastName);
  alert('Greetings ' + firstName + ' ' + lastName);
} 
else {
  console.log('Wrong input!');
  alert ('Wrong input!');
}
