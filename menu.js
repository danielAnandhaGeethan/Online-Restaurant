function addMinus(event, type){
    const count = event.target.closest('.count');
    const input = count.querySelector('input');
    let x = input.value;
    x = parseInt(x);

    if(type == "Minus"){
        x -= 1;
    } else{
        x += 1;
    }
    input.value = x.toString();
}
