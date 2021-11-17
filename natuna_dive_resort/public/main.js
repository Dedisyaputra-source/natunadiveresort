const nav = document.querySelector('.navigation');
const button = document.querySelector('.button');
const btnClose = document.querySelector('.btnclose');
button.addEventListener('click', function(){
    nav.classList.add('aktive');
});
btnClose.addEventListener('click', function(){
    nav.classList.remove('aktive');
});

window.addEventListener('scroll', function(){
    const navigation = document.querySelector('.navigation');
    navigation.classList.toggle('sticky', window.scrollY > 0);
});
