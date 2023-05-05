function compareQualify(a,b){
    let alice = 0;
    let bob = 0;
    for(let i=0; i < 3; i++){
        if(validateRange(a[i]) && validateRange(b[i]) ){
            if(a[i] > b[i]){
                alice++;
            }else if(a[i] < b[i]){
                bob++;
            }
        }else{
            return 'Error tu matriz no cumple con los parametros dentro de 1 y abajo de 100';
        }
    }
    return[alice,bob];
}

function validateRange(value){
    if(value >= 1 && value <= 100){
        return true;
    }else{
        return false;
    }
}

const a = [17, 28, 30];
const b = [99, 16, 8];
const points = compareQualify(a, b);
console.log(points); // Output: 1