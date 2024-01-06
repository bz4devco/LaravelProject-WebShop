$(function() {
    isMoney();
});

function isMoney(){
    var numberInputs = $("input.money");
    var convertToCurrencyDisplayFormat = function(str) {
        var regex = /(-?[0-9]+)([0-9]{3})/;
        str += '';
        while (regex.test(str)) {
            str = str.replace(regex, '$1,$2');
        }
        return str;
    };
    var stripNonNumeric = function(str) {
        str += ''; 
        str = str.replace(/[^0-9]/g, '');
        return str;
    };
    
    numberInputs.blur(function() {
         this.value = convertToCurrencyDisplayFormat( this.value );
    });
        numberInputs.focus(function() {
       this.value = convertToCurrencyDisplayFormat( this.value );
        
    });
    numberInputs.keyup(function() {
     this.value = stripNonNumeric( this.value );
      this.value = convertToCurrencyDisplayFormat( this.value );
      
    });
    $("form").submit(function() {
        numberInputs.each(function() {
            this.value = stripNonNumeric( this.value );
        });
    });
}

$(".number").on("keypress", function(event) {
	
    var englishAlphabetAndWhiteSpace = /[0-9]/g;
    var key = String.fromCharCode(event.which);
    
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || englishAlphabetAndWhiteSpace.test(key)) 
        return true;

    return false;
});

$('.number').on("paste",function(e)
{
    e.preventDefault();
});