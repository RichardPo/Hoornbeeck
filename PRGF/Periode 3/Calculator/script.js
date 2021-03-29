function GetHistory() {
    return document.querySelector("#history-value").innerHTML;
}

function PrintHistory(num) {
    document.querySelector("#history-value").innerHTML = num;
}

function GetOutput() {
    return document.querySelector("#output-value").innerHTML;
}

function PrintOutput(num) {
    if(num == "") {
        document.querySelector("#output-value").innerHTML = "";
    } else {
        document.querySelector("#output-value").innerHTML = GetFormattedNumber(num);
    }
}

function GetFormattedNumber(num) {
    if(num == "-") {
        return "";
    }
    var n = Number(num);
    var value = n.toLocaleString("en");
    return value;
}

function ReverseNumberFormat(num) {
    return Number(num.replace(/,/g, ""));
}

var operators = document.getElementsByClassName("operator");
for(var i = 0; i < operators.length; i++) {
    operators[i].addEventListener("click", function() {
        if(this.id == "clear") {
            PrintOutput("");
            PrintHistory("");
        } else if(this.id == "backspace") {
            var output = ReverseNumberFormat(GetOutput()).toString();
            if(output) {
                output = output.substr(0, output.length - 1);
                PrintOutput(output);
            }
        } else {
            var output = GetOutput();
            var history = GetHistory();
            if(output == "" && history != "") {
                if(isNaN(history[history.length - 1])) {
                    history = history.substr(0, history.length - 1);
                }
            }
            if(output != "" || history != "") {
                output = output == "" ? output : ReverseNumberFormat(output);
                history = history + output;
                if(this.id == "=") {
                    var result = eval(history);
                    PrintOutput(result);
                    PrintHistory("");
                } else {
                    history = history + this.id;
                    PrintHistory(history);
                    PrintOutput("");
                }
            }
        }
    });
}

var numbers = document.getElementsByClassName("number");
for(var i = 0; i < numbers.length; i++) {
    numbers[i].addEventListener("click", function() {
        var output = ReverseNumberFormat(GetOutput());
        if(output != NaN) {
            output = output + this.id;
            PrintOutput(output);
        }
    });
}