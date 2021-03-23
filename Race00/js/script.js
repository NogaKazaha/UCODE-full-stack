let lightmode = false
let base = 0 // 0 dec, 1 bin, 2 hex
let history = document.getElementsByClassName('equation').item(0).textContent;
let result = document.getElementsByClassName('result').item(0).textContent;
let buttons = document.getElementsByClassName('button');
let equalPressed = false;
let memory = 0;
let operators = '÷^*√+-'.split('')
let bases = [['10', '16'], ['2', '10'], ['16', '2']]
let conversion = false
let selectData = [['Centimeters', 'Meters', 'Kilometers'], ['Grams', 'Kilograms', 'Tonnes'], ['Centimetres sq.', 'Meters sq.', 'Kilometers sq.']]
// 1 *100 *1000
function sqrt(val) {
    return Math.sqrt(val)
}

function fact(val) {
    var rval=1;
    for (var i = 2; i <= val; i++)
        rval = rval * i;
    return rval;
}

function pow(val, pow) {
    return Math.pow(val, pow)
}

function reset() {
    history = '';
    result = '';
    setHistory('');
    setResult('0');
}

function mplus() {
    memory = memory + '+' + history;
}

function mminus() {
    memory = memory + '-' + history;
}

function mclear() {
    memory = 0;
}

function mrealoc() {
    let mem = eval(memory);
    setResult(mem);
}


function getLastOperatorIndex() {
    let max = -1
    for (i in operators) {
        if (history.lastIndexOf(operators[i]) > max) {
            max = history.lastIndexOf(operators[i]);
        }
    }

    return max
}



function switchHistoryBase(base, oldbase) {
    if (history.indexOf('.') > -1) {
        history = ''
        setHistory('')
    }
    if (history == '') return;

    let numbers = history.split(")").join("").split("pow(").join("").split("sqrt(").join("").split("fact(").join("").split(/÷|\^|\*|√|\+|\-/)
    for (i in numbers) {
        history = history.replace(numbers[i], parseInt(numbers[i], oldbase).toString(base))
    }

    result = parseInt(result, oldbase).toString(base)
    setResult(result)

    setHistory(history.toUpperCase())
}

function createOption(id, did) {
    let opt = document.createElement('option')
    opt.setAttribute('id', id)
    opt.textContent = selectData[did][id]

    return opt
}


function placeSelectData(id) {
    document.getElementById('originalsel').innerHTML = ''
    document.getElementById('originalsel').appendChild(createOption(0, id))
    document.getElementById('originalsel').appendChild(createOption(1, id))
    document.getElementById('originalsel').appendChild(createOption(2, id))

    document.getElementById('outputsel').innerHTML = ''
    document.getElementById('outputsel').appendChild(createOption(0, id))
    document.getElementById('outputsel').appendChild(createOption(1, id))
    document.getElementById('outputsel').appendChild(createOption(2, id))
}

let conversions = [
    [ //len
        [1, 0.01, 0.01*0.001],
        [100, 1, 1000],
        [100 * 1000, 1000, 1]
    ],
    [ //weight
        [1, 0.001, 0.001*0.001],
        [1000, 1, 0.001],
        [1000 * 1000, 1000, 1]
    ],
    [ //area
        [1, 0.0001, 1 * Math.pow(10, -10)],
        [10000, 1, 1 * Math.pow(10, -6)],
        [Math.pow(10, 10), Math.pow(10, 6), 1]
    ]
]

function onWrite() {
    let selectBox = document.getElementById("sl");
    let selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if (selectedValue >= 0) {
        console.log(document.getElementById('in').value)
        if (document.getElementById('originalsel').selectedIndex == document.getElementById('outputsel').selectedIndex) {
            document.getElementById('out').value = document.getElementById('in').value
        } else {
            document.getElementById('out').value = document.getElementById('in').value * conversions[selectedValue][document.getElementById('originalsel').selectedIndex][document.getElementById('outputsel').selectedIndex]
        }
    }
}

function changedSelect() {
    let selectBox = document.getElementById("sl");
    let selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if (selectedValue >= 0) placeSelectData(selectedValue)
}

function replacePow() {
    let left_operand = ''
    let right_operand = ''
    for (let index = history.indexOf('^') - 1; index >= 0; index--) {
        if (operators.indexOf(history[index]) > -1) break
        left_operand = history[index] + '' + left_operand
    }

    for (let index = history.indexOf('^') + 1; index  < history.length; index++) {
        if (operators.indexOf(history[index]) > -1) break
        right_operand += '' + history[index]
    }

    history = history.replace(left_operand + '^' + right_operand, 'pow(' + left_operand + ', ' + right_operand + ')')
}

function insert(val) {
    if (base == 1 && Number.isInteger(val) && val > 1) return;
    if (base > 0 && val == '.') return;
    if (equalPressed == true && (val != '÷' && val != '^' && val != '*' && val != '√' && val != '+' && val != '-')) {
        history = '';
        setHistory('');
    }
    equalPressed = false;
    history = getHistory()

    if (operators.includes(val) && val != '-' && (history == '' || operators.includes(history.slice(-1)) )) return;
    if (history.slice(-1) == ')' && operators.indexOf(val) == -1) return;

    if (val == '√') {
        if (history.match(/^[0-9]+$/)) {
            history = 'sqrt(' + getHistory() + ')'
        } else {
            history = history.slice(0, getLastOperatorIndex() + 1) + 'sqrt(' + history.slice(getLastOperatorIndex() + 1) + ')'
        }
    } else if (history.match(/^[0-9]+$/) || history.slice(-1) != val || Number.isInteger(val)){
        if (operators.indexOf(val) > -1 && history.indexOf('^') > -1) {
            replacePow()
        }

        history += val;
    }
    setHistory(history);
}

function toggleConversion() {
    if (conversion) { //open
        document.getElementsByClassName('calculator').item(0).style.height = '67.5vh'
        document.getElementsByClassName('conversion').item(0).classList.add('hide')
    } else { //close
        document.getElementsByClassName('calculator').item(0).style.height = '89vh'
        document.getElementsByClassName('conversion').item(0).classList.remove('hide')
    }
    conversion = !conversion
}

function factorial() {
    if (history.match(/^[0-9]+$/)) {
        history = 'fact(' + getHistory().replace('!', '') + ')'
    } else if (!operators.includes(history.slice(-1))) {
        history = history.slice(0, getLastOperatorIndex() + 1) + 'fact(' + history.slice(getLastOperatorIndex() + 1).replace('!', '') + ')'
    }
    setHistory(history);
}

function percent() {
    equalPressed = false;
    history = history + '%';
    setHistory(history);
    history = history.replace('%', '');
    let int = parseInt(history, 10);
    let res = int * 0.01;
    history = res;
    setHistory(history)
}

function equal() {
    if (history == '') return;

    if (history.indexOf('^') > -1) {
        replacePow()
    }

    history = "" + history;
    history = history.replace('÷', '/');
    let tmp_history = history
    let numbers = history.split(")").join("").split("pow(").join("").split("sqrt(").join("").split("fact(").join("").split(/÷|\^|\*|√|\+|\-/)
    for (i in numbers) {
        tmp_history = tmp_history.replace(numbers[i], parseInt(numbers[i], bases[base][0]))
    }

    let answer = eval(tmp_history);
    setHistory(answer.toString(bases[base][0]).toUpperCase());
    setResult(answer.toString(bases[base][0]).toUpperCase());
    history =  "" + answer;
    equalPressed = true;
}

function changeSign() {
    equalPressed = false;
    if(history[0] === '-') {
        history = "" + history;
        history = history.replace('-','');
    }
    else {
        history = '-' + history;
    }
    setHistory(history);
}

function switchModes() {
    if (lightmode) {
        document.getElementById('modeswitch').textContent = '💡'
        document.getElementById('modeswitch').classList.remove('modeswitch')
        document.getElementsByClassName('calculator').item(0).classList.remove('lightmode')
        document.getElementsByClassName('screen').item(0).classList.remove('lightmode_screen')
        let mem_buttons = document.getElementsByClassName('memory');
        for (i in mem_buttons) {
            mem_buttons.item(i).classList.remove('lightmode_memory')
        }
    } else {
        document.getElementById('modeswitch').textContent = '🌙'
        document.getElementById('modeswitch').classList.add('modeswitch')
        document.getElementsByClassName('calculator').item(0).classList.add('lightmode')
        document.getElementsByClassName('screen').item(0).classList.add('lightmode_screen')
        let mem_buttons = document.getElementsByClassName('memory');
        for (i in mem_buttons) {
            mem_buttons.item(i).classList.add('lightmode_memory')
        }
    }

    lightmode = !lightmode
}

function setResult(val) {
    if (val == undefined || val == NaN) val = 'Error'
    document.getElementsByClassName('result').item(0).textContent = val
}

function getHistory() {
    return document.getElementsByClassName('equation').item(0).textContent;
}

function setHistory(val) {
    if (val == undefined || val == NaN) val = 'Error'
    document.getElementsByClassName('equation').item(0).textContent = val;
}

function createButton(text) {
    let but = document.createElement('div')
    but.classList.add('button')
    but.innerText = text
    but.setAttribute("onclick", 'insert("' + text + '")')
    return but
}

function switchBase() {
    base++;
    if (base > 2) base = 0


    let buttons;
    let rows
    switch (base) {
        case 0: // dec
            switchHistoryBase(10, 16)
            document.getElementById('baseswitch').textContent = 'DEC'
            buttons = document.getElementsByClassName('button')
            for (i in buttons) {
                if (buttons.item(i).classList.contains('inactive'))
                    buttons.item(i).classList.remove('inactive')
            }
            document.getElementsByClassName('buttons').item(0).style.width = '40vh'
            document.getElementsByClassName('calculator').item(0).style.width = '45vh'
            document.getElementsByClassName('screen').item(0).style.width = '40vh'

            rows = document.getElementsByClassName('brow')
            rows.item(0).lastChild.remove()
            rows.item(1).lastChild.remove()
            rows.item(2).lastChild.remove()
            rows.item(3).lastChild.remove()
            rows.item(4).lastChild.remove()
            rows.item(5).lastChild.remove()
            break;
        case 1: // bin
            switchHistoryBase(2, 10)
            document.getElementById('baseswitch').textContent = 'BIN'
            let dec = ['2', '3', '4', '5', '6', '7', '8', '9']
            buttons = document.getElementsByClassName('button')
            for (i in buttons) {
                if (dec.includes(buttons.item(i).textContent)) {
                    buttons.item(i).classList.add('inactive')
                }
                if (buttons.item(i).textContent == '.') {
                    buttons.item(i).classList.add('inactive')
                }
            }
            break;
        case 2: // hex
            switchHistoryBase(16, 2)
            document.getElementById('baseswitch').textContent = 'HEX'
            buttons = null
            buttons = document.getElementsByClassName('button')
            for (i in buttons) {
                if (buttons.item(i).classList.contains('inactive'))
                    buttons.item(i).classList.remove('inactive')
            }

            for (i in buttons) {
                if (buttons.item(i).textContent == '.') {
                    buttons.item(i).classList.add('inactive')
                    break
                }
            }

            document.getElementsByClassName('calculator').item(0).style.width = '52vh'
            document.getElementsByClassName('buttons').item(0).style.width = '47vh'
            document.getElementsByClassName('screen').item(0).style.width = '47vh'


            rows = document.getElementsByClassName('brow')
            rows.item(0).appendChild(createButton('A'))
            rows.item(1).appendChild(createButton('B'))
            rows.item(2).appendChild(createButton('C'))
            rows.item(3).appendChild(createButton('D'))
            rows.item(4).appendChild(createButton('E'))
            rows.item(5).appendChild(createButton('F'))
            break;
        default:
            break;
    }
}
