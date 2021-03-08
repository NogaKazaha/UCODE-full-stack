const num = 10;
const bigInt = 10n;
const str = 'text';
const bool = false;
const null_var = null;
const Undefined = undefined;
const obj = {
     a: 1, 
     b: 'text'};
const symb = Symbol('id');
function func() {
}

alert ('num is ' + typeof(num) +
 '\nbigInt is ' + typeof(bigInt) +
 '\nstr is ' + typeof(str) +
 '\nbool is ' + typeof(bool) +
 '\nnull_var is ' + typeof(null_var) + 
 '\nUndefined is ' + typeof(Undefined) +
 '\nobj is ' + typeof(obj) +
 '\nsymb is ' + typeof(symb) +
 '\nfunc is ' + typeof(func));