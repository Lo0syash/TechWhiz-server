import Swiper from "swiper";
import ScrollReveal from "scrollreveal";

document.querySelector('.header__burger').addEventListener('click', ()=>{
    document.querySelector('.body').classList.toggle('active')
    document.querySelector('.nav').classList.toggle('active')
    document.querySelector('.header__burger').classList.toggle('active')
})

let all = document.querySelectorAll('.r-all');
for (let a = 0; a < all.length; a++){
    let radios = all[a].querySelectorAll('.r-input');
    let i = 1;
    all[a].style.setProperty('--options',radios.length);
    radios.forEach((input)=>{
        input.setAttribute('data-pos',i);
        input.addEventListener('click',(e)=>{
            all[a].style.setProperty('--options-active',e.target.getAttribute('data-pos'));
        });
        i++;
    });
};

if (document.location.pathname == '/groups/create/' || document.location.pathname == '/groups/create' || document.location.pathname == '/group') {
    document.querySelector('.inviteCode--input').value = generateRandomString(10)
}

document.querySelectorAll('.openModalTransaction').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.getAttribute('data-user-id');
        const userName = this.getAttribute('data-user-name');
        const userSurName = this.getAttribute('data-user-surname');

        document.getElementById('user_id').value = userId;
        document.getElementById('user_name').innerText = userName;
        document.getElementById('user_surname').innerText = userSurName;

        document.querySelector('.modalTransaction').classList.add('active');
        document.querySelector('.outline').classList.add('active');
    });
});

document.querySelector('.outline').addEventListener('click', ()=>{
    document.querySelector('.modalTransaction').classList.remove('active')
    document.querySelector('.outline').classList.remove('active')
})

document.querySelector('.btn-function.plus').addEventListener('click', () => {
    document.querySelector('.btn-function.plus').classList.add('active')
    document.querySelector('.btn-function.minus').classList.remove('active')
    document.querySelector('.checkbox_plus').checked = true
    document.querySelector('.checkbox_minus').checked = false
})

document.querySelector('.btn-function.minus').addEventListener('click', () => {
    document.querySelector('.btn-function.minus').classList.add('active')
    document.querySelector('.btn-function.plus').classList.remove('active')
    document.querySelector('.checkbox_plus').checked = false
    document.querySelector('.checkbox_minus').checked = true
})


