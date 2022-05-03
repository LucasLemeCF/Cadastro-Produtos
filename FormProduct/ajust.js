const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('isEdit') == 'true';
let title = document.getElementsByClassName('card-header text-warning');
title.textContent=myParam ? 'Atualizar' : 'Adicionar'
console.log(title)
title.className = myParam ? 'card-header text-warning' : 'card-header text-success';
let cor = document.getElementsByClassName('card border-warning m-3');
cor.className = myParam ? 'card border-warning m-3' : 'card border-success m-3';

if(document.getElementsByClassName('card-header text-success').length > 0){
    title = document.getElementsByClassName('card-header text-success');
    title.innerHTML = myParam ? 'Atualizar' : 'Adicionar';
    title.className = myParam ? 'card-header text-warning' : 'card-header text-success'
}

if(document.getElementsByClassName('card border-success m-3').length > 0){
    cor = document.getElementsByClassName('card border-success m-3');
    cor.className = myParam ? 'card border-success m-3' : 'card border-warning m-3'
}

