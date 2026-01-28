let x=3;
let y=10;
function multiply(a,b){
    return a*b;
}
console.log(multiply(x,y));

const result =(function(){
    let a=5;
    let b=7;
    return a*b;
})();
console.log(result);

const divide = (a,b) => a/b;
console.log(divide(20,4));

