var login = document.getElementById('login');
var signUp = document.getElementById('sign-up');

console.log('kdqsnhg');
login.addEventListener('click', ()=>{
    login.classList.add("active");
    signUp.classList.remove("active");
    $("#container").load('./login.php');
    console.log('kdqsnhg');
})
signUp.addEventListener('click', ()=>{
    signUp.classList.add("active");
    login.classList.remove("active");
    $("#container").load('./signup.php');
    console.log('kdqsnhg');
})
